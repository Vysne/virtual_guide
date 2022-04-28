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
            <a href="{{ route('second_floor_en') }}" style="text-decoration: none; color: yellow">EN</a>
        </div>
    </div>
    <div id="main_container">
        <div id="plan_filter">
            <div class="plan_search"></div>
            <div class="responsive_select">
                <div class="plan_search">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control p-3" style="font-size: 1.2rem" placeholder="Paieška"/>
                        </div>
                        <button type="button" class="btn btn-primary" style="padding: 0.375rem 1.75rem">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="small_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="{{ route('first_floor') }}">1 aukštas</option>
                        <option value="{{ route('first_half_floor') }}">1 aukšto balkonas</option>
                        <option selected>2 aukštas</option>
                        <option value="{{ route('third_floor') }}">3 aukštas</option>
                    </select>
                </div>
                <div class="big_select">
                    <select id="filter" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="0">Taškų filtras</option>
                        <option value="work_room">Darbo kambariai</option>
                        <option value="entrance">Įėjimai</option>
                        <option value="books">Knygų skyriai</option>
                        <option value="stairs">Laiptai</option>
                        <option value="emergency_exit">Avariniai išėjimai</option>
                        <option value="relax_and_work_zone">Laisvalaikio ir darbo vietos</option>
                        <option value="disabled">Neįgaliesiems</option>
                        <option value="employee">Darbuotojų patalpos</option>
                    </select>
                </div>
                <div class="big_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option>Mokslo šaka</option>
                        <option value="{{ route('third_floor') }}">Mokslas ir žinios, vadyba, kompiuterija</option>
                        <option value="{{ route('third_floor') }}">Filosofija ir psichologija</option>
                        <option value="{{ route('third_floor') }}">Socialiniai mokslai</option>
                        <option value="{{ route('third_floor') }}">Matematika ir gamtos mokslai</option>
                        <option value="{{ route('first_floor') }}">Taikomieji mokslai, medicina ir technologija</option>
                        <option value="{{ route('third_floor') }}">Menas, pramogos ir sportas</option>
                        <option value="{{ route('third_floor') }}">Kalba ir kalbotyra</option>
                        <option value="{{ route('third_floor') }}">Geografija, biografija ir istorija</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="plan_holder">
            <div id="plan_canvas">
                <img class="plan" src="assets/second_floor.png" alt="First and half floor">
                <div id="plan_bullets">
                    <div data-filter="books">
                        <div id="books_bullet_fourth" title="Leisure books section">
                            <img src="assets/books_pointer.png">
                        </div>
                    </div>
                    <div data-filter="entrance">
                        <div id="enter_bullet_fourth" title="Entrance from KTU Faculty of Construction and Architecture">
                            <img src="assets/enter_pointer.png">
                        </div>
                    </div>
                    <div data-filter="work_room">
                        <div id="engine_box_room_bullet_fourth" title="ENGINE BOX workroom(M9)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="group_room_bullet_fourth" title="PRIVATE BOX workroom(P1)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="group_room_second_bullet_fourth" title="PRIVATE BOX workroom(P2)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="group_room_third_bullet_fourth" title="PRIVATE BOX workroom(P3)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="group_room_fourth_bullet_fourth" title="PRIVATE BOX workroom(P4)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="vr_room_fourth" title="HUMAN BOX workrooms(M6;M6.1)">
                            <img src="assets/vr_pointer.png">
                            <img src="assets/group_room_pointer.png" style="margin-left: 60px">
                        </div>
                        <div id="work_place_bullet_fourth" title="AUDIENCE BOX workroom(M8)">
                            <img src="assets/group_room_pointer.png">
                        </div>
                        <div id="work_place_second_bullet_fourth" title="ELEMENTS BOX workrooms(M7;M7.1)">
                            <img src="assets/group_room_pointer.png">
                            <img src="assets/group_room_pointer.png" style="margin-left: 125px">
                        </div>
                        <div id="projector_bullet_fourth" title="M10 Amphitheatre">
                            <img src="assets/projector_pointer.png">
                        </div>
                    </div>
                    <div data-filter="stairs">
                        <div id="stairs_bullet_fourth" title="Stairs to third floor">
                            <img src="assets/stairs_pointer.png">
                        </div>
                        <div id="stairs_second_bullet_fourth" title="Stairs to third floor">
                            <img src="assets/stairs_pointer.png">
                        </div>
                        <div id="stairs_third_bullet_fourth" title="Stairs to first floor balcony">
                            <img src="assets/stairs_pointer.png">
                        </div>
                        <div id="stairs_fourth_bullet_fourth" title="Stairs to third floor">
                            <img src="assets/stairs_pointer.png">
                        </div>
                        <div id="stairs_fifth_bullet_fourth" title="Stairs to third floor">
                            <img src="assets/stairs_pointer.png">
                        </div>
                    </div>
                    <div data-filter="emergency_exit">
                        <div id="emergency_bullet_fourth" title="Emergency stairs">
                            <img src="assets/emergency_pointer.png">
                        </div>
                        <div id="emergency_second_bullet_fourth" title="Emergency stairs">
                            <img src="assets/emergency_pointer.png">
                        </div>
                    </div>
                    <div data-filter="relax_and_work_zone">
                        <div id="pc_work_bullet_fourth" title="Computer work spaces">
                            <img src="assets/pc_work_pointer.png">
                        </div>
                        <div id="relax_zone_bullet_fourth" title="Relax zone">
                            <img src="assets/relax_zone_pointer.png">
                        </div>
                        <div id="relax_zone_second_bullet_fourth" title="Relax zone">
                            <img src="assets/relax_zone_pointer.png">
                        </div>
                        <div id="toilet_bullet_fourth" title="WC">
                            <img src="assets/toilet_pointer.png">
                        </div>
                        <div id="work_place_third_bullet_fourth" title="Workplaces">
                            <img src="assets/work_place_pointer.png">
                        </div>
                    </div>
                    <div data-filter="employee">
                        <div id="employe_only_bullet_fourth" title="Employees only">
                            <img src="assets/employe_only_pointer.png">
                        </div>
                    </div>
                    <div data-filter="disabled">
                        <div id="elevator_disabled_bullet_fourth" title="Elevator for disabled people">
                            <img src="assets/disabled_elevator_pointer.png">
                        </div>
                        <div id="elevator_disabled_second_bullet_fourth" title="Elevator for disabled people">
                            <img src="assets/disabled_elevator_pointer.png">
                        </div>

                        <div id="toilet_disabled_bullet_fourth" title="WC for disabled people">
                            <img src="assets/toilet_pointer.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
