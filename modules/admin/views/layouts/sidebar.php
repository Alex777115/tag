<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle"
                           href="<?= yii\helpers\Url::to(['default/index']); ?>" style="text-decoration:none;font-size:50px;font-weight:600">
                           LOGO 
                        </a>

                    </div>
                    <div class="logo-element">
                        <a href="<?= yii\helpers\Url::to(['default/index']); ?>" style="text-decoration: none">
                            LOGO
                        </a>

                    </div>
                </li>
                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-grid-3x3-gap-fill">
                                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                            </svg>
                        </i><span class="nav-label">Все проекты</span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" >
                      <?= app\components\RowWidget::widget() ?>
                    </ul>
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-geo-alt-fill">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                        </i><span class="nav-label">Облако тегов</span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li><a href="<?= yii\helpers\Url::to(['tag/tag']) ?>"
                               style="text-decoration: none">
                                <i class="bi bi-cloud">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud" viewBox="0 0 16 16">
                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                    </svg>
                                </i>
                                Сфера</a></li>
                        <li><a href="<?= yii\helpers\Url::to(['tag/tag_2']) ?>" style="text-decoration: none">
                                <i class="bi bi-cloud">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud" viewBox="0 0 16 16">
                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                    </svg>
                                </i>
                                Highcharts</a>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i
                                class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-tools" >
                                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                            </svg>
                        </i> <span class="nav-label">Аналитика</span></a>
                    <!--                    <ul class="nav nav-second-level collapse" aria-expanded="false">-->
                    <!--                        <li><a href="http://webapplayers.com/inspinia_admin-v2.9.4/contacts.html">Contacts</a></li>-->
                    <!--                    </ul>-->
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i
                                class="fa"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="16px"
                                                viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                   stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" style="mix-blend-mode: normal">
                                    <g transform="scale(5.12,5.12)">
                                        <path d="M45.403,25.562c-0.506,-1.89 -1.518,-3.553 -2.906,-4.862c1.134,-2.665 0.963,-5.724 -0.487,-8.237c-1.391,-2.408 -3.636,-4.131 -6.322,-4.851c-1.891,-0.506 -3.839,-0.462 -5.669,0.088c-1.743,-2.318 -4.457,-3.7 -7.372,-3.7c-4.906,0 -9.021,3.416 -10.116,7.991c-0.01,0.001 -0.019,-0.003 -0.029,-0.002c-2.902,0.36 -5.404,2.019 -6.865,4.549c-1.391,2.408 -1.76,5.214 -1.04,7.9c0.507,1.891 1.519,3.556 2.909,4.865c-1.134,2.666 -0.97,5.714 0.484,8.234c1.391,2.408 3.636,4.131 6.322,4.851c0.896,0.24 1.807,0.359 2.711,0.359c1.003,0 1.995,-0.161 2.957,-0.45c1.742,2.322 4.445,3.703 7.373,3.703c4.911,0 9.028,-3.422 10.12,-8.003c2.88,-0.35 5.431,-2.006 6.891,-4.535c1.39,-2.408 1.759,-5.214 1.039,-7.9zM35.17,9.543c2.171,0.581 3.984,1.974 5.107,3.919c1.049,1.817 1.243,4 0.569,5.967c-0.099,-0.062 -0.193,-0.131 -0.294,-0.19l-9.169,-5.294c-0.312,-0.179 -0.698,-0.177 -1.01,0.006l-10.198,6.041l-0.052,-4.607l8.663,-5.001c1.947,-1.124 4.214,-1.421 6.384,-0.841zM29.737,22.195l0.062,5.504l-4.736,2.805l-4.799,-2.699l-0.062,-5.504l4.736,-2.805zM14.235,14.412c0,-4.639 3.774,-8.412 8.412,-8.412c2.109,0 4.092,0.916 5.458,2.488c-0.105,0.056 -0.214,0.103 -0.318,0.163l-9.17,5.294c-0.312,0.181 -0.504,0.517 -0.5,0.877l0.133,11.851l-4.015,-2.258zM6.528,23.921c-0.581,-2.17 -0.282,-4.438 0.841,-6.383c1.06,-1.836 2.823,-3.074 4.884,-3.474c-0.004,0.116 -0.018,0.23 -0.018,0.348v10.588c0,0.361 0.195,0.694 0.51,0.872l10.329,5.81l-3.964,2.348l-8.662,-5.002c-1.946,-1.123 -3.338,-2.936 -3.92,-5.107zM14.83,40.457c-2.171,-0.581 -3.984,-1.974 -5.107,-3.919c-1.053,-1.824 -1.249,-4.001 -0.573,-5.97c0.101,0.063 0.196,0.133 0.299,0.193l9.169,5.294c0.154,0.089 0.327,0.134 0.5,0.134c0.177,0 0.353,-0.047 0.51,-0.14l10.198,-6.041l0.052,4.607l-8.663,5.001c-1.946,1.125 -4.214,1.424 -6.385,0.841zM35.765,35.588c0,4.639 -3.773,8.412 -8.412,8.412c-2.119,0 -4.094,-0.919 -5.459,-2.494c0.105,-0.056 0.216,-0.098 0.32,-0.158l9.17,-5.294c0.312,-0.181 0.504,-0.517 0.5,-0.877l-0.134,-11.85l4.015,2.258zM42.631,32.462c-1.056,1.83 -2.84,3.086 -4.884,3.483c0.004,-0.12 0.018,-0.237 0.018,-0.357v-10.588c0,-0.361 -0.195,-0.694 -0.51,-0.872l-10.329,-5.81l3.964,-2.348l8.662,5.002c1.946,1.123 3.338,2.937 3.92,5.107c0.581,2.17 0.282,4.438 -0.841,6.383z"></path>
                                    </g>
                                </g>
                            </svg></i> <span class="nav-label">Анализ ChatGPT</span></a>
                    <!--                    <ul class="nav nav-second-level collapse" aria-expanded="false">-->
                    <!--                        <li><a href="http://webapplayers.com/inspinia_admin-v2.9.4/search_results.html">Search-->
                    <!--                                results</a></li>-->
                    <!--                    </ul>-->
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i
                                class="fa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-graph-up" >
                                <path fill-rule="evenodd"
                                      d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                            </svg></i> <span class="nav-label">Соцрейтинг</span>
                    </a>
                    <!--                    <ul class="nav nav-second-level collapse" aria-expanded="false">-->
                    <!--                        <li><a href="http://webapplayers.com/inspinia_admin-v2.9.4/toast_notifications.html">Notification</a></li>-->
                    <!--                    </ul>-->
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i
                                class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-graph-up-arrow" >
                                <path fill-rule="evenodd"
                                      d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </i> <span class="nav-label">Медиарейтинг</span></a>
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i
                                class="fa"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                 class="bi bi-search" >
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg></i> <span class="nav-label">Поиск по источнику</span></a>
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-tag-fill">
                                <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                            </svg>
                        </i>
                        <span class="nav-label">Избранное</span></a>
                </li>

                <li>
                    <a href="" aria-expanded="false" style="text-decoration: none"><i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-file-earmark-plus">
                                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                            </svg>
                        </i> <span class="nav-label">Создать проект</span></a>
                </li>




            </ul>

        </div>
    </nav>









