// Сфера
// Генерация случайных цветов для ссылок
function getRandomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

// Назначаем случайные цвета ссылкам
window.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.tags-cloud a');
    links.forEach(link => {
        link.style.color = getRandomColor();
    });
});

class FibonacciSphere {
    #points;

    get points() {
        return this.#points;
    }

    constructor(N) {
        this.#points = [];
        const goldenAngle = Math.PI * (3 - Math.sqrt(5));

        for (let i = 0; i < N; i++) {
            const y = 1 - (i / (N - 1)) * 2;
            const radius = Math.sqrt(1 - y ** 2);
            const a = goldenAngle * i;
            const x = Math.cos(a) * radius;
            const z = Math.sin(a) * radius;

            this.#points.push([x, y, z]);
        }
    }
}

class TagsCloud {
    #root;
    #size;
    #sphere;
    #tags;
    #rotationAxis;
    #rotationAngle;
    #rotationSpeed;
    #frameRequestId;

    constructor(root) {
        this.#root = root;
        this.#size = Math.min(window.innerWidth, window.innerHeight) * 0.5; // Снижаем размер до 50% экрана
        this.#tags = root.querySelectorAll('.tag');
        this.#sphere = new FibonacciSphere(this.#tags.length);
        this.#rotationAxis = [1, 0, 0];
        this.#rotationAngle = 0;
        this.#rotationSpeed = 0;

        this.#updatePositions();
        this.#initEventListeners();
        this.#root.classList.add('-loaded');
    }

    #initEventListeners() {
        window.addEventListener('resize', this.#updatePositions.bind(this));
        document.addEventListener('mousemove', this.#onMouseMove.bind(this));
        document.addEventListener('touchmove', this.#onTouchMove.bind(this));
    }

    #onMouseMove(e) {
        const rootRect = this.#root.getBoundingClientRect();
        const deltaX = e.clientX - (rootRect.left + this.#root.offsetWidth / 2);
        const deltaY = e.clientY - (rootRect.top + this.#root.offsetHeight / 2);
        this.#updateRotation(deltaX, deltaY);
    }

    #onTouchMove(e) {
        const touch = e.touches[0];
        const rootRect = this.#root.getBoundingClientRect();
        const deltaX = touch.clientX - (rootRect.left + this.#root.offsetWidth / 2);
        const deltaY = touch.clientY - (rootRect.top + this.#root.offsetHeight / 2);
        this.#updateRotation(deltaX, deltaY);
    }

    #updateRotation(deltaX, deltaY) {
        const a = Math.atan2(deltaX, deltaY) - Math.PI / 2;
        const axis = [Math.sin(a), Math.cos(a), 0];
        const delta = Math.sqrt(deltaX ** 2 + deltaY ** 2);
        const speed = delta / Math.max(window.innerHeight, window.innerWidth) / 5;

        this.#rotationAxis = axis;
        this.#rotationSpeed = speed;
    }

    #update() {
        this.#rotationAngle += this.#rotationSpeed;
        this.#updatePositions();
    }

    #updatePositions() {
        const sin = Math.sin(this.#rotationAngle);
        const cos = Math.cos(this.#rotationAngle);
        const ux = this.#rotationAxis[0];
        const uy = this.#rotationAxis[1];
        const uz = this.#rotationAxis[2];

        const rotationMatrix = [
            [
                cos + (ux ** 2) * (1 - cos),
                ux * uy * (1 - cos) - uz * sin,
                ux * uz * (1 - cos) + uy * sin,
            ],
            [
                uy * ux * (1 - cos) + uz * sin,
                cos + (uy ** 2) * (1 - cos),
                uy * uz * (1 - cos) - ux * sin,
            ],
            [
                uz * ux * (1 - cos) - uy * sin,
                uz * uy * (1 - cos) + ux * sin,
                cos + (uz ** 2) * (1 - cos)
            ]
        ];

        const N = this.#tags.length;

        for (let i = 0; i < N; i++) {
            const x = this.#sphere.points[i][0];
            const y = this.#sphere.points[i][1];
            const z = this.#sphere.points[i][2];

            const transformedX =
                rotationMatrix[0][0] * x
                + rotationMatrix[0][1] * y
                + rotationMatrix[0][2] * z;
            const transformedY =
                rotationMatrix[1][0] * x
                + rotationMatrix[1][1] * y
                + rotationMatrix[1][2] * z;
            const transformedZ =
                rotationMatrix[2][0] * x
                + rotationMatrix[2][1] * y
                + rotationMatrix[2][2] * z;

            const translateX = this.#size * transformedX / 1.6; // Снижение масштаба
            const translateY = this.#size * transformedY / 1.6; // Снижение масштаба
            const scale = (transformedZ + 1) / 5; // Масштабирование
            const transform = `translateX(${translateX}px) translateY(${translateY}px) scale(${scale})`;
            const opacity = (transformedZ + 1.5) / 2.5;

            this.#tags[i].style.transform = transform;
            this.#tags[i].style.opacity = opacity;
        }
    }

    start() {
        this.#update();
        this.#frameRequestId = requestAnimationFrame(this.start.bind(this));
    }

    stop() {
        cancelAnimationFrame(this.#frameRequestId);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('.tags-cloud');
    const cloud = new TagsCloud(root);
    cloud.start();
});

//Highcharts
var data = tags.map(item => ({
    name: item.tag,
    weight: item.count,
    url: '<?= \yii\helpers\Url::to(["tag/tag-posts", "tag" => ""]) ?>' + encodeURIComponent(item.tag)
}));

Highcharts.chart('container', {
    series: [{
        type: 'wordcloud',
        data: data
    }],
    title: { text: '' },
    tooltip: {
        formatter: function() {
            var tagName = this.point.name.charAt(0).toUpperCase() + this.point.name.slice(1);
            var tagColor = this.point.color;
            return `<div class="custom-tooltip" style="color: ${tagColor};">${tagName}</div>
                    <br><div class="custom-tooltip-description" style="color: ${tagColor};">Количество посещений: ${this.point.weight}</div>`;
        },
        backgroundColor: 'rgb(54,52,52,0.7)',  // Темный фон
        style: { color: '#000', padding: '10px', borderRadius: '5px' }
    },
    chart: { backgroundColor: '#f5f5f5' },
    plotOptions: {
        wordcloud: { maxFontSize: 50, minFontSize: 10, rotationLimit: 45 }
    },
    credits: { enabled: false }
});

document.getElementById('container').addEventListener('click', function(event) {
    if (event.target.tagName === 'text') {
        var tag = event.target.textContent;
        console.log('Tag clicked:', tag);
        var tagUrl = tags.find(item => item.tag === tag)?.url || '';
        console.log('Tag URL:', tagUrl);
        if (tagUrl) {
            console.log('Redirecting to:', tagUrl);
            window.location.href = tagUrl;
        }
    }
});
