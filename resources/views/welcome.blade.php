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
                    <a href="{{ route('first_floor_en') }}" style="text-decoration: none; color: yellow">EN</a>
                </div>
            </div>
            @if(isset($pointers) && !empty($pointers))
            <div id="main_container">
                <div id="plan_filter">
                    <div class="plan_search"></div>
                        <div class="responsive_select">
{{--                            <div class="plan_search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="form-outline">--}}
{{--                                        <input type="search" id="form1" class="form-control p-3" style="font-size: 1.2rem" placeholder="Paieška"/>--}}
{{--                                    </div>--}}
{{--                                    <button type="button" class="btn btn-primary" style="padding: 0.375rem 1.75rem">--}}
{{--                                        <i class="fas fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="small_select">
                                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                                    <option selected>1 aukštas</option>
                                    <option value="{{ route('first_half_floor') }}">1 aukšto balkonas</option>
                                    <option value="{{ route('second_floor') }}">2 aukštas</option>
                                    <option value="{{ route('third_floor') }}">3 aukštas</option>
                                </select>
                            </div>
                            <div class="big_select">
                                <select id="filter" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                                    <option value="0">Taškų filtras</option>
                                    <option value="work_room">Darbo kambariai</option>
                                    <option value="entrance">Įėjimai</option>
                                    <option value="services">Paslaugos</option>
                                    <option value="books">Knygų skyriai</option>
                                    <option value="stairs">Laiptai</option>
                                    <option value="emergency_exit">Avariniai išėjimai</option>
                                    <option value="relax_and_work_zone">Laisvalaikio ir darbo vietos</option>
                                    <option value="disabled">Neįgaliesiems</option>
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
                            <img class="plan" src="assets/first_floor.png" alt="First floor">
                            <div id="plan_bullets">
                                <div data-filter="books">
                                    <div id="books_bullet" title="Book shelves">
                                        <div id="book_bullet_wrapper">
                                            <img src="assets/books_pointer.png">
                                            <div class="book_bullet_desc">
                                                <h4 class="title">{{$pointers[22]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[22]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="entrance">
                                    <div id="enter_bullet" title="Entrance from KTU Faculty of Construction and Architecture">
                                        <div id="enter_bullet_wrapper">
                                            <img src="assets/enter_pointer.png">
                                            <div class="enter_bullet_desc">
                                                <h4 class="title">{{$pointers[12]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[12]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enter_main_bullet" title="Main entrance">
                                        <div id="enter_main_bullet_wrapper">
                                            <img src="assets/enter_pointer.png">
                                            <div class="enter_main_bullet_desc">
                                                <h4 class="title">{{$pointers[14]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[14]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="work_room">
                                    <div id="redirect_room">
                                        <div id="cyber_box_room_bullet" title="CYBER BOX workroom(M4)">
                                            <div id="cyber_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="cyber_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[45]->name}}</h4>
                                                    <div class="info">
                                                        <div class="info">
                                                            <p>{{$pointers[45]->comment}}</p>
                                                            <p>{{$pointers[45]->email}}</p>
                                                            <p>{{$pointers[45]->phone_number}}</p>
                                                            <p>{{$pointers[45]->main_email}}</p>
                                                            <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="stock_box_room_bullet" title="STOCK BOX workroom(M5)">
                                            <div id="stock_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="stock_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[46]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[46]->comment}}</p>
                                                        <p>{{$pointers[46]->email}}</p>
                                                        <p>{{$pointers[46]->phone_number}}</p>
                                                        <p>{{$pointers[46]->main_email}}</p>
                                                        <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="calc_box_room_bullet" title="CALC BOX workrooms(M3;M3.1;M3.2)">
                                            <div id="calc_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="calc_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[3]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[3]->comment}}</p>
                                                        <p>{{$pointers[3]->email}}</p>
                                                        <p>{{$pointers[3]->phone_number}}</p>
                                                        <p>{{$pointers[3]->main_email}}</p>
                                                        <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="calc_box_room_second_bullet" title="CALC BOX workrooms(M3;M3.1;M3.2)">
                                            <div id="calc_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="calc_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[3]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[3]->comment}}</p>
                                                        <p>{{$pointers[3]->email}}</p>
                                                        <p>{{$pointers[3]->phone_number}}</p>
                                                        <p>{{$pointers[3]->main_email}}</p>
                                                        <button id="redirect_room1" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="calc_box_room_third_bullet" title="CALC BOX workrooms(M3;M3.1;M3.2)">
                                            <div id="calc_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="calc_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[3]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[3]->comment}}</p>
                                                        <p>{{$pointers[3]->email}}</p>
                                                        <p>{{$pointers[3]->phone_number}}</p>
                                                        <p>{{$pointers[3]->main_email}}</p>
                                                        <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="arch_box_room_bullet" title="ARCH BOX workroom(M2)">
                                            <div id="arch_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="arch_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[6]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[6]->comment}}</p>
                                                        <p>{{$pointers[6]->email}}</p>
                                                        <p>{{$pointers[6]->phone_number}}</p>
                                                        <p>{{$pointers[6]->main_email}}</p>
                                                        <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="volt_box_room_bullet" title="VOLT BOX workroom(M1)">
                                            <div id="volt_box_room_bullet_wrapper">
                                                <img src="assets/group_room_pointer.png">
                                                <div class="volt_box_room_bullet_desc">
                                                    <h4 class="title">{{$pointers[7]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[7]->comment}}</p>
                                                        <p>{{$pointers[7]->email}}</p>
                                                        <p>{{$pointers[7]->phone_number}}</p>
                                                        <p>{{$pointers[7]->main_email}}</p>
                                                        <button id="redirect_room" class="pc_button" style="font-size: 0.9rem">Rezervacija</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="services">
                                    <div id="redirect_print">
                                        <div id="printing_bullet" title="Printing stations" class="">
                                            <div id="printing_bullet_wrapper">
                                                <img src="assets/printing_pointer.png">
                                                <div class="printing_bullet_desc">
                                                    <h4 class="title">{{$pointers[4]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[4]->comment}}</p>
                                                        <p>{{$pointers[4]->main_email}}</p>
                                                        <button id="redirect_print" class="pc_button" style="font-size: 0.9rem">Paslaugos</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div id="redirect_pc">
                                        <div id="locker_bullet" title="Lockers">
                                            <div id="locker_bullet_wrapper">
                                                <img src="assets/locker_pointer.png">
                                                <div class="locker_bullet_desc">
                                                    <h4 class="title">{{$pointers[9]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[9]->comment}}</p>
                                                        <p>{{$pointers[9]->main_email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="reception_bullet" title="Reception">
                                            <div id="reception_bullet_wrapper">
                                                <img src="assets/reception_pointer.png">
                                                <div class="reception_bullet_desc">
                                                    <h4 class="title">{{$pointers[8]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[8]->comment}}</p>
                                                        <p>{{$pointers[8]->phone_number}}</p>
                                                        <p>{{$pointers[8]->main_email}}</p>
                                                        <p>{{$pointers[8]->work_hours}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="cafe_bullet" title="Cafe">
                                            <div id="cafe_bullet_wrapper">
                                                <img src="assets/dinner_pointer.png">
                                                <div class="cafe_bullet_desc">
                                                    <h4 class="title">{{$pointers[2]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[2]->comment}}</p>
                                                        <p>{{$pointers[2]->phone_number}}</p>
                                                        <p>{{$pointers[2]->main_email}}</p>
                                                        <p>{{$pointers[2]->work_hours}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dinner_bullet" title="Kitchen for employees and students">
                                            <div id="dinner_bullet_wrapper">
                                                <img src="assets/dinner_pointer.png">
                                                <div class="dinner_bullet_desc">
                                                    <h4 class="title">{{$pointers[5]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[5]->comment}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pc_bullet" title="Order or book rental station" onclick="">
                                            <div id="pc_bullet_wrapper">
                                                <img src="assets/pc_pointer.png">
                                                <div class="pc_bullet_desc">
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
                                        <div id="pc_second_bullet" title="Order or book rental station">
                                            <div id="pc_second_bullet_wrapper">
                                                <img src="assets/pc_pointer.png">
                                                <div class="pc_second_bullet_desc">
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
                                        <div id="self_service_bullet" title="Self-service station">
                                            <div id="self_service_bullet_wrapper">
                                                <img src="assets/self_service_pointer.png">
                                                <div class="self_service_bullet_desc">
                                                    <h4 class="title">{{$pointers[1]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[1]->comment}}</p>
                                                        <p>{{$pointers[1]->main_email}}r</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="self_service_second_bullet" title="Self-service station">
                                            <div id="self_service_second_bullet_wrapper">
                                                <img src="assets/self_service_pointer.png">
                                                <div class="self_service_second_bullet_desc">
                                                    <h4 class="title">{{$pointers[1]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[1]->comment}}</p>
                                                        <p>{{$pointers[1]->main_email}}r</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="book_takeout_bullet" title="Book takeout station">
                                            <div id="book_takeout_bullet_wrapper">
                                                <img src="assets/book_takeout_pointer.png">
                                                <div class="book_takeout_bullet_desc">
                                                    <h4 class="title">{{$pointers[49]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[49]->comment}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="book_takeout_second_bullet" title="Book takeout station">
                                            <div id="book_takeout_second_bullet_wrapper">
                                                <img src="assets/book_takeout_pointer.png">
                                                <div class="book_takeout_second_bullet_desc">
                                                    <h4 class="title">{{$pointers[49]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[49]->comment}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="box_bullet" title="Publications return box">
                                            <div id="box_bullet_wrapper">
                                                <img src="assets/box_pointer.png">
                                                <div class="box_bullet_desc">
                                                    <h4 class="title">{{$pointers[44]->name}}</h4>
                                                    <div class="info">
                                                        <p>{{$pointers[44]->comment}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="stairs">
                                    <div id="stairs_bullet" title="Stairs to library and work stations">
                                        <div id="stairs_bullet_wrapper">
                                            <img src="assets/stairs_pointer.png">
                                            <div class="stairs_bullet_desc">
                                                <h4 class="title">{{$pointers[15]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[15]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stairs_second_floor_bullet" title="Stairs to first floor balcony">
                                        <div id="stairs_second_floor_bullet_wrapper">
                                            <img src="assets/stairs_pointer.png">
                                            <div class="stairs_second_floor_bullet_desc">
                                                <h4 class="title">{{$pointers[16]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[16]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stairs_second_floor_second_bullet" title="Stairs to first floor balcony">
                                        <div id="stairs_second_floor_second_bullet_wrapper">
                                            <img src="assets/stairs_pointer.png">
                                            <div class="stairs_second_floor_second_bullet_desc">
                                                <h4 class="title">{{$pointers[16]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[16]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="emergency_exit">
                                    <div id="emergency_bullet" title="Emergency stairs">
                                        <div id="emergency_bullet_wrapper">
                                            <img src="assets/emergency_pointer.png">
                                            <div class="emergency_bullet_desc">
                                                <h4 class="title">{{$pointers[11]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[11]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="emergency_main_bullet" title="Emergency stairs">
                                        <div id="emergency_main_bullet_wrapper">
                                            <img src="assets/emergency_pointer.png">
                                            <div class="emergency_main_bullet_desc">
                                                <h4 class="title">{{$pointers[11]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[11]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="relax_and_work_zone">
                                    <div id="work_place_bullet" title="Workplaces">
                                        <div id="relax_and_work_zone_wrapper">
                                            <img src="assets/work_place_pointer.png">
                                            <div class="relax_and_work_zone_desc">
                                                <h4 class="title">{{$pointers[19]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[19]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="work_place_second_bullet" title="Workplaces">
                                        <div id="work_place_second_bullet_wrapper">
                                            <img src="assets/work_place_pointer.png">
                                            <div class="work_place_second_bullet_desc">
                                                <h4 class="title">{{$pointers[19]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[19]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="relax_zone_bullet" title="Relax zone">
                                        <div id="relax_zone_bullet_wrapper">
                                            <img src="assets/relax_zone_pointer.png">
                                            <div class="relax_zone_bullet_desc">
                                                <h4 class="title">{{$pointers[20]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[20]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="toilet_bullet" title="WC">
                                        <div id="toilet_bullet_wrapper">
                                            <img src="assets/toilet_pointer.png">
                                            <div class="toilet_bullet_desc">
                                                <h4 class="title">{{$pointers[17]->name}}</h4>
                                                <div class="info">
                                                    <p style="font-size: 2rem; text-align: center">{{$pointers[17]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-filter="disabled">
                                    <div id="elevator_disabled_bullet" title="Elevator for disabled people">
                                        <div id="elevator_disabled_bullet_wrapper">
                                            <img src="assets/disabled_elevator_pointer.png">
                                            <div class="elevator_disabled_bullet_desc">
                                                <h4 class="title">{{$pointers[21]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[21]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enter_disabled_bullet" title="Entrance for disabled people">
                                        <div id="enter_disabled_bullet_wrapper">
                                            <img src="assets/enter_pointer.png">
                                            <div class="enter_disabled_bullet_desc">
                                                <h4 class="title">{{$pointers[13]->name}}</h4>
                                                <div class="info">
                                                    <p>{{$pointers[13]->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="toilet_disabled_bullet" title="WC for disabled people">
                                        <div id="toilet_disabled_bullet_wrapper">
                                            <img src="assets/toilet_pointer.png">
                                            <div class="toilet_disabled_bullet_desc">
                                                <h4 class="title">{{$pointers[18]->name}}</h4>
                                                <div class="info">
                                                    <p style="font-size: 2rem; text-align: center">{{$pointers[18]->comment}}</p>
                                                </div>
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
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
