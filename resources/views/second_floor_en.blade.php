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
            <a href="/en">
                <img src="assets/logo.png" alt="KTU library" width="250" height="150">
            </a>
        </div>
        <div id = "clock" onload="currentTime()"></div>
        <div id = "greetingEN">
            <h1 id="greetingsTitle" style="font-size: 2.5rem"></h1>
        </div>
        <div id="language_tag">
            <a href="{{ route('second_floor') }}" style="text-decoration: none; color: yellow">LT</a>
        </div>
    </div>
    <div id="main_container">
        <div id="plan_filter">
            <div class="plan_search"></div>
            <div class="responsive_select">
{{--                <div class="plan_search">--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="form-outline">--}}
{{--                            <input type="search" id="form1" class="form-control p-3" style="font-size: 1.2rem" placeholder="Search"/>--}}
{{--                        </div>--}}
{{--                        <button type="button" class="btn btn-primary" style="padding: 0.375rem 1.75rem">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="small_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="{{ route('first_floor_en') }}">1st floor</option>
                        <option value="{{ route('first_half_floor_en') }}">1st floor balcony</option>
                        <option selected>2nd floor</option>
                        <option value="{{ route('third_floor_en') }}">3rd floor</option>
                    </select>
                </div>
                <div class="big_select">
                    <select id="filter" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option value="0">Pointer filter</option>
                        <option value="work_room">Work rooms</option>
                        <option value="entrance">Entrances</option>
                        <option value="books">Book sections</option>
                        <option value="stairs">Stairs</option>
                        <option value="emergency_exit">Emergency exits</option>
                        <option value="relax_and_work_zone">Relax and work zones</option>
                        <option value="disabled">For disabled people</option>
                        <option value="employee">Staff premises</option>
                    </select>
                </div>
                <div class="big_select">
                    <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-lg mb-3 p-3" aria-label=".form-select-lg example">
                        <option>Education type</option>
                        <option value="{{ route('third_floor_en') }}">Science and Knowledge, management and computer science (0)</option>
                        <option value="{{ route('third_floor_en') }}">Philosophy and psychology (1)</option>
                        <option value="{{ route('third_floor_en') }}">Social sciences (3)</option>
                        <option value="{{ route('third_floor_en') }}">Mathematics and natural sciences (5)</option>
                        <option value="{{ route('first_floor_en') }}">Applied sciences, medicine and technology (6)</option>
                        <option value="{{ route('third_floor_en') }}">The arts, entertainment and sport (7)</option>
                        <option value="{{ route('third_floor_en') }}">Language and linguistics (8)</option>
                        <option value="{{ route('third_floor_en') }}">Geography, biography and history (9)</option>
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
                            <div id="books_bullet_fourth_wrapper">
                                <img src="assets/books_pointer.png">
                                <div class="books_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[27]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[27]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="entrance">
                        <div id="enter_bullet_fourth" title="Entrance from KTU Faculty of Construction and Architecture">
                            <div id="enter_bullet_fourth_wrapper">
                                <img src="assets/enter_pointer.png">
                                <div class="enter_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[25]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[25]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="work_room">
                        <div id="redirect_room_en">
                            <div id="engine_box_room_bullet_fourth" title="ENGINE BOX workroom(M9)">
                                <div id="engine_box_room_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="engine_box_room_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[32]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[32]->comment}}</p>
                                            <p>{{$pointers[32]->email}}</p>
                                            <p>{{$pointers[32]->phone_number}}</p>
                                            <p>{{$pointers[32]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="group_room_bullet_fourth" title="PRIVATE BOX workroom(P1)">
                                <div id="group_room_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="group_room_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[40]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[40]->comment}}</p>
                                            <p>{{$pointers[40]->email}}</p>
                                            <p>{{$pointers[40]->phone_number}}</p>
                                            <p>{{$pointers[40]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="group_room_second_bullet_fourth" title="PRIVATE BOX workroom(P2)">
                                <div id="group_room_second_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="group_room_second_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[41]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[41]->comment}}</p>
                                            <p>{{$pointers[41]->email}}</p>
                                            <p>{{$pointers[41]->phone_number}}</p>
                                            <p>{{$pointers[41]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="group_room_third_bullet_fourth" title="PRIVATE BOX workroom(P3)">
                                <div id="group_room_third_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="group_room_third_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[42]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[42]->comment}}</p>
                                            <p>{{$pointers[42]->email}}</p>
                                            <p>{{$pointers[42]->phone_number}}</p>
                                            <p>{{$pointers[42]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="group_room_fourth_bullet_fourth" title="PRIVATE BOX workroom(P4)">
                                <div id="group_room_fourth_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="group_room_fourth_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[43]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[43]->comment}}</p>
                                            <p>{{$pointers[43]->email}}</p>
                                            <p>{{$pointers[43]->phone_number}}</p>
                                            <p>{{$pointers[43]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="vr_room_fourth" title="HUMAN BOX workrooms(M6;M6.1)">
                                <div id="vr_room_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="vr_room_fourth_desc">
                                        <h4 class="title">{{$pointers[37]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[37]->comment}}</p>
                                            <p>{{$pointers[37]->email}}</p>
                                            <p>{{$pointers[37]->phone_number}}</p>
                                            <p>{{$pointers[37]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="vr_room_second_fourth" title="HUMAN BOX workrooms(M6;M6.1)">
                                <div id="vr_room_second_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="vr_room_second_fourth_desc">
                                        <h4 class="title">{{$pointers[37]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[37]->comment}}</p>
                                            <p>{{$pointers[37]->email}}</p>
                                            <p>{{$pointers[37]->phone_number}}</p>
                                            <p>{{$pointers[37]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="work_place_bullet_fourth" title="AUDIENCE BOX workroom(M8)">
                                <div id="work_place_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="work_place_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[39]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[39]->comment}}</p>
                                            <p>{{$pointers[39]->email}}</p>
                                            <p>{{$pointers[39]->phone_number}}</p>
                                            <p>{{$pointers[39]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="work_place_second_bullet_fourth" title="ELEMENTS BOX workrooms(M7;M7.1)">
                                <div id="work_place_second_bullet_fourth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="work_place_second_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[38]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[38]->comment}}</p>
                                            <p>{{$pointers[38]->email}}</p>
                                            <p>{{$pointers[38]->phone_number}}</p>
                                            <p>{{$pointers[38]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="work_place_second_bullet_fifth" title="ELEMENTS BOX workrooms(M7;M7.1)">
                                <div id="work_place_second_bullet_fifth_wrapper">
                                    <img src="assets/group_room_pointer.png">
                                    <div class="work_place_second_bullet_fifth_desc">
                                        <h4 class="title">{{$pointers[38]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[38]->comment}}</p>
                                            <p>{{$pointers[38]->email}}</p>
                                            <p>{{$pointers[38]->phone_number}}</p>
                                            <p>{{$pointers[38]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="projector_bullet_fourth" title="M10 Amphitheatre">
                                <div id="projector_bullet_fourth_wrapper">
                                    <img src="assets/projector_pointer.png">
                                    <div class="projector_bullet_fourth_desc">
                                        <h4 class="title">{{$pointers[30]->name}}</h4>
                                        <div class="info">
                                            <p>{{$pointers[30]->comment}}</p>
                                            <p>{{$pointers[30]->email}}</p>
                                            <p>{{$pointers[30]->phone_number}}</p>
                                            <p>{{$pointers[30]->main_email}}</p>
                                            <button id="redirect_room_en" class="pc_button" style="font-size: 0.9rem">Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="stairs">
                        <div id="stairs_bullet_fourth" title="Stairs to third floor">
                            <div id="stairs_bullet_fourth_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[31]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[31]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stairs_second_bullet_fourth" title="Stairs to third floor">
                            <div id="stairs_second_bullet_fourth_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_second_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[31]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[31]->comment}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="stairs_third_bullet_fourth" title="Stairs to first floor balcony">
                            <div id="stairs_third_bullet_fourth_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_third_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[16]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[16]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stairs_fourth_bullet_fourth" title="Stairs to third floor">
                            <div id="stairs_fourth_bullet_fourth_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_fourth_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[31]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[31]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stairs_fifth_bullet_fourth" title="Stairs to third floor">
                            <div id="stairs_fifth_bullet_fourth_wrapper">
                                <img src="assets/stairs_pointer.png">
                                <div class="stairs_fifth_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[31]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[31]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="emergency_exit">
                        <div id="emergency_bullet_fourth" title="Emergency stairs">
                            <div id="emergency_bullet_fourth_wrapper">
                                <img src="assets/emergency_pointer.png">
                                <div class="emergency_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[11]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[11]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="emergency_second_bullet_fourth" title="Emergency stairs">
                            <div id="emergency_second_bullet_fourth_wrapper">
                                <img src="assets/emergency_pointer.png">
                                <div class="emergency_second_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[11]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[11]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="relax_and_work_zone">
                        <div id="pc_work_bullet_fourth" title="Computer work spaces">
                            <div id="pc_work_bullet_fourth_wrapper">
                                <img src="assets/pc_work_pointer.png">
                                <div class="pc_work_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[33]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[33]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="relax_zone_bullet_fourth" title="Relax zone">
                            <div id="relax_zone_bullet_fourth_wrapper">
                                <img src="assets/relax_zone_pointer.png">
                                <div class="relax_zone_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[20]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[20]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="relax_zone_second_bullet_fourth" title="Relax zone">
                            <div id="relax_zone_second_bullet_fourth_wrapper">
                                <img src="assets/relax_zone_pointer.png">
                                <div class="relax_zone_second_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[20]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[20]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="toilet_bullet_fourth" title="WC">
                            <div id="toilet_bullet_fourth_wrapper">
                                <img src="assets/toilet_pointer.png">
                                <div class="toilet_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[17]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[17]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="work_place_third_bullet_fourth" title="Workplaces">
                            <div id="work_place_third_bullet_fourth_wrapper">
                                <img src="assets/work_place_pointer.png">
                                <div class="work_place_third_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[19]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[19]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="employee">
                        <div id="employe_only_bullet_fourth" title="Employees only">
                            <div id="employe_only_bullet_fourth_wrapper">
                                <img src="assets/employe_only_pointer.png">
                                <div class="employe_only_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[10]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[10]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-filter="disabled">
                        <div id="elevator_disabled_bullet_fourth" title="Elevator for disabled people">
                            <div id="elevator_disabled_bullet_fourth_wrapper">
                                <img src="assets/disabled_elevator_pointer.png">
                                <div class="elevator_disabled_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[21]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[21]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="elevator_disabled_second_bullet_fourth" title="Elevator for disabled people">
                            <div id="elevator_disabled_second_bullet_fourth_wrapper">
                                <img src="assets/disabled_elevator_pointer.png">
                                <div class="elevator_disabled_second_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[21]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[21]->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="toilet_disabled_bullet_fourth" title="WC for disabled people">
                            <div id="toilet_disabled_bullet_fourth_wrapper">
                                <img src="assets/toilet_pointer.png">
                                <div class="toilet_disabled_bullet_fourth_desc">
                                    <h4 class="title">{{$pointers[18]->name}}</h4>
                                    <div class="info">
                                        <p>{{$pointers[18]->comment}}</p>
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
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
