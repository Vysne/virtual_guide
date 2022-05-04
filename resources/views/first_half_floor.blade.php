<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
<div class="wrap">
    <div id="header">
        <div id="logo">
            <a href="/">
                <img src="assets/logo.png" alt="KTU library" width="250" height="150">
            </a>
        </div>
        <div id = "clock" onload="currentTime()"></div>
        <div id = "greetingLT">
            <h1 id="greetingsTitle" style="font-size: 2.5rem"></h1>
        </div>
        <div id="language_tag">
            <a href="{{ route('first_half_floor_en') }}" style="text-decoration: none; color: yellow">EN</a>
        </div>
    </div>
    @if(isset($pointers) && !empty($pointers))
    <div id="main_container">
        <div id="plan_filter">
            <div class="plan_search"></div>
            <div class="responsive_select">
{{--                <div class="plan_search">--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="form-outline">--}}
{{--                            <input type="search" id="form1" class="form-control p-3" style="font-size: 1.2rem" placeholder="Paieška"/>--}}
{{--                        </div>--}}
{{--                        <button type="button" class="btn btn-primary" style="padding: 0.375rem 1.75rem">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="small_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="{{ route('first_floor') }}">1 aukštas</option>
                        <option selected>1 aukšto balkonas</option>
                        <option value="{{ route('second_floor') }}">2 aukštas</option>
                        <option value="{{ route('third_floor') }}">3 aukštas</option>
                    </select>
                </div>
                <div class="big_select">
                    <select id="filter" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="0">Taškų filtras</option>
                        <option value="services">Paslaugos</option>
                        <option value="books">Knygų skyriai</option>
                        <option value="stairs">Laiptai</option>
                        <option value="relax_and_work_zone">Laisvalaikio ir darbo vietos</option>
                        <option value="disabled">Neįgaliesiems</option>
                    </select>
                </div>
                <div class="big_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option>Mokslo šaka</option>
                        <option value="{{ route('third_floor') }}">Mokslas ir žinios, vadyba, kompiuterija (0)</option>
                        <option value="{{ route('third_floor') }}">Filosofija ir psichologija (1)</option>
                        <option value="{{ route('third_floor') }}">Socialiniai mokslai (3)</option>
                        <option value="{{ route('third_floor') }}">Matematika ir gamtos mokslai (5)</option>
                        <option value="{{ route('first_floor') }}">Taikomieji mokslai, medicina ir technologija (6)</option>
                        <option value="{{ route('third_floor') }}">Menas, pramogos ir sportas (7)</option>
                        <option value="{{ route('third_floor') }}">Kalba ir kalbotyra (8)</option>
                        <option value="{{ route('third_floor') }}">Geografija, biografija ir istorija (9)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="plan_holder">
            <div id="plan_canvas">
                <img class="plan" src="assets/first_half_floor.png" alt="First and half floor">
                <div id="plan_bullets">
                    <div data-filter="books">
                        <div id="books_bullet_second" title="Textbook shelves">
                            <div id="books_bullet_second_wrapper">
                                <img src="assets/books_pointer.png">
                                <div class="books_bullet_second_desc">
                                    <h4 class="title">{{$pointers[26]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[26]->comment}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div data-filter="services">
                        <div id="redirect_pc">
                            <div id="pc_bullet_second" title="Order or book rental station">
                                <div id="pc_bullet_second_wrapper">
                                    <img src="assets/pc_pointer.png">
                                    <div class="pc_bullet_second_desc">
                                        <h4 class="title">{{$pointers[0]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[0]->comment}}</p>
                                            <p>{{$pointers[0]->email}}</p>
                                            <p>{{$pointers[0]->main_email}}</p>
                                            <button id="redirect_pc" class="pc_button" style="font-size: 0.9rem">Bibliotekos katalogas</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="relax_and_work_zone">
                        <div id="work_place_bullet_second" title="Workplaces">
                            <div id="work_place_bullet_second_wrapper">
                                <img src="assets/work_place_pointer.png">
                                <div class="work_place_bullet_second_desc">
                                    <h4 class="title">{{$pointers[19]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[19]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="work_place_second_bullet_second" title="Workplaces">
                            <div id="work_place_second_bullet_second_wrapper">
                                <img src="assets/work_place_pointer.png">
                                <div class="work_place_second_bullet_second_desc">
                                    <h4 class="title">{{$pointers[19]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[19]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="work_place_third_bullet_second" title="Workplaces">
                            <div id="work_place_third_bullet_second_wrapper">
                                <img src="assets/work_place_pointer.png">
                                <div class="work_place_third_bullet_second_desc">
                                    <h4 class="title">{{$pointers[19]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[19]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="work_place_fourth_bullet_second" title="Workplaces">
                            <div id="work_place_fourth_bullet_second_wrapper">
                                <img src="assets/work_place_pointer.png">
                                <div class="work_place_fourth_bullet_second_desc">
                                    <h4 class="title">{{$pointers[19]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[19]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="stairs">
                        <div id="stairs_bullet_second" title="Stairs to first floor">
                            <div id="stairs_bullet_second_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_bullet_second_desc">
                                    <h4 class="title">{{$pointers[23]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[23]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stairs_second_floor_bullet_second" title="Stairs to first floor ">
                            <div id="stairs_second_floor_bullet_second_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_second_floor_bullet_second_desc">
                                    <h4 class="title">{{$pointers[23]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[23]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stairs_second_floor_second_bullet_second" title="Stairs to second floor">
                            <div id="stairs_second_floor_second_bullet_second_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_second_floor_second_bullet_second_desc">
                                    <h4 class="title">{{$pointers[24]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[24]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="disabled">
                        <div id="elevator_disabled_bullet_second" title="Elevator for disabled people">
                            <div id="elevator_disabled_bullet_second_wrapper">
                                <img src="assets/disabled_elevator_pointer.png">
                                <div class="elevator_disabled_bullet_second_desc">
                                    <h4 class="title">{{$pointers[21]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[21]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    @endif
</div>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
