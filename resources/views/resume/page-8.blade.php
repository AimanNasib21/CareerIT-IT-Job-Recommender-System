<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resume - {{ Auth::user()->name }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Resume Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('resume') }}/assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('resume') }}/assets/css/pillar-1.css">


</head>

<body>

    <article class="resume-wrapper position-relative text-center">
        <div class="resume-wrapper-inner mx-auto bg-white text-start shadow-lg">
            <header class="resume-header pt-md-0 pt-4">
                <div class="row">
                    <div class="col-block col-md-auto resume-picture-holder text-md-start text-center">
                        <img class="picture" src="assets/images/profile.jpg" alt="">
                    </div><!--//col-->
                    <div class="col">
                        <div class="row justify-content-center justify-content-md-between p-4">
                            <div class="primary-info col-auto">
                                <h1 class="name text-uppercase text-uppercase mb-1 mt-0 text-white"> {{ Auth::user()->name }}</h1>
                                <div class="title mb-3">
                                    @if (Auth::user()->resumeUser)
                                        {{ Auth::user()->resumeUser->job_title ?? '' }}
                                    @endif
                                </div>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><a class="text-link" href="#"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>{{ Auth::user()->email }}</a></li>
                                    <li><a class="text-link" href="#"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>
                                            @if (Auth::user()->resumeUser)
                                                {{ Auth::user()->resumeUser->job_title ?? '' }}
                                            @endif
                                        </a></li>
                                </ul>
                            </div><!--//primary-info-->
                            <div class="secondary-info col-auto mt-2">
                                <ul class="resume-social list-unstyled">
                                    <li class="mb-3"><a class="text-link" href="#"><span class="fa-container me-2 text-center"><i class="fab fa-linkedin-in fa-fw"></i></span>
                                            @if (Auth::user()->resumeUser)
                                                {{ Auth::user()->resumeUser->linkedin ?? '' }}
                                            @endif
                                        </a></li>
                                    <li class="mb-3"><a class="text-link" href="#"><span class="fa-container me-2 text-center"><i class="fab fa-github-alt fa-fw"></i></span>
                                            @if (Auth::user()->resumeUser)
                                                {{ Auth::user()->resumeUser->github ?? '' }}
                                            @endif
                                        </a></li>
                                    <li class="mb-3"><a class="text-link" href="#"><span class="fa-container me-2 text-center"><i class="fab fa-codepen fa-fw"></i></span>
                                            @if (Auth::user()->resumeUser)
                                                {{ Auth::user()->resumeUser->codepen ?? '' }}
                                            @endif
                                        </a></li>
                                    <li><a class="text-link" href="#"><span class="fa-container me-2 text-center"><i class="fas fa-globe"></i></span>
                                            @if (Auth::user()->resumeUser)
                                                {{ Auth::user()->resumeUser->website ?? '' }}
                                            @endif
                                        </a></li>
                                </ul>
                            </div><!--//secondary-info-->
                        </div><!--//row-->

                    </div><!--//col-->
                </div><!--//row-->
            </header>
            <div class="resume-body p-5">
                <section class="resume-section summary-section mb-5">
                    <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Career Summary</h2>
                    <div class="resume-section-content">
                        <p class="mb-0">
                            @if (Auth::user()->resumeUser)
                                {!! Auth::user()->resumeUser->summary ?? '' !!}
                            @endif
                        </p>
                    </div>
                </section><!--//summary-section-->
                <div class="row">
                    <div class="col-lg-9">
                        <section class="resume-section experience-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Work Experience</h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    @if (Auth::user()->resumeWorks)
                                        @forelse (Auth::user()->resumeWorks as $work)
                                            <article class="resume-timeline-item position-relative pb-5">

                                                <div class="resume-timeline-item-header mb-2">
                                                    <div class="d-flex flex-column flex-md-row">
                                                        <h3 class="resume-position-title font-weight-bold mb-1">{{ $work->title }}</h3>
                                                        <div class="resume-company-name ms-auto">{{ $work->company }}</div>
                                                    </div><!--//row-->
                                                    <div class="resume-position-time">{{ $work->start_year }} - {{ $work->end_year }}</div>
                                                </div><!--//resume-timeline-item-header-->
                                                <div class="resume-timeline-item-desc">
                                                    <p>{!! $work->description !!}</p>
                                                    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
                                                    <p>{!! $work->achievements !!}</p>
                                                    </ul>
                                                    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
                                                    <ul class="list-inline">
                                                        @php
                                                            // Assuming $data contains the JSON string fetched from the database
                                                            $jsonString = $work->technologies;
                                                            // Decode the JSON string into an array
                                                            $arrayTechnologies = json_decode($jsonString);
                                                        @endphp
                                                        @forelse ($arrayTechnologies as $technology)
                                                            <li class="list-inline-item"><span class="badge bg-secondary badge-pill">{{ $technology }}</span></li>
                                                        @empty
                                                            <li class="list-inline-item"><span class="badge bg-secondary badge-pill">No Technologies</span></li>
                                                        @endforelse
                                                    </ul>
                                                </div><!--//resume-timeline-item-desc-->

                                            </article><!--//resume-timeline-item-->
                                        @empty
                                        @endforelse
                                    @endif

                                </div><!--//resume-timeline-->
                            </div>
                        </section><!--//experience-section-->
                    </div>
                    <div class="col-lg-3">
                        <section class="resume-section skills-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Skills &amp; Tools</h2>
                            @if (Auth::user()->resumeSkills)
                                <div class="resume-section-content">
                                    <div class="resume-skill-item">
                                        <h4 class="resume-skills-cat font-weight-bold">Frontend</h4>
                                        <ul class="list-unstyled mb-4">
                                            @forelse (Auth::user()->resumeSkills->where('type', 'frontend')->sortByDesc('created_at')->take(5) as $skill)
                                                <li class="mb-2">
                                                    <div class="resume-skill-name">{{ $skill->technology }}</div>
                                                    <div class="progress resume-progress">
                                                        <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: {{ $skill->percentage }}%" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="mb-2">
                                                    <div class="resume-skill-name">No Skills</div>
                                                    <div class="progress resume-progress">
                                                        <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div><!--//resume-skill-item-->

                                    <div class="resume-skill-item">
                                        <h4 class="resume-skills-cat font-weight-bold">Backend</h4>
                                        <ul class="list-unstyled mb-4">
                                            @forelse (Auth::user()->resumeSkills->where('type', 'frontend')->sortByDesc('created_at')->take(5) as $skill)
                                                <li class="mb-2">
                                                    <div class="resume-skill-name">{{ $skill->technology }}</div>
                                                    <div class="progress resume-progress">
                                                        <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: {{ $skill->percentage }}%" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="mb-2">
                                                    <div class="resume-skill-name">No Skills</div>
                                                    <div class="progress resume-progress">
                                                        <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div><!--//resume-skill-item-->

                                    <div class="resume-skill-item">
                                        <h4 class="resume-skills-cat font-weight-bold">Others</h4>
                                        <ul class="list-inline">
                                            @if (Auth::user()->resumeOthers)
                                                @forelse (Auth::user()->resumeOthers->sortByDesc('created_at')->take(5) as $skill)
                                                    <li class="list-inline-item"><span class="badge badge-light">{{ $skill->title }}</span></li>
                                                @empty
                                                    <li class="list-inline-item"><span class="badge badge-light">No Skills</span></li>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div><!--//resume-skill-item-->
                                </div><!--resume-section-content-->
                            @endif
                        </section><!--//skills-section-->
                        <section class="resume-section education-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Education</h2>
                            <div class="resume-section-content">
                                @if (Auth::user()->resumeEdus)
                                    <ul class="list-unstyled">
                                        @forelse (Auth::user()->resumeEdus->sortByDesc('created_at')->take(5) as $edu)
                                            <li class="mb-2">
                                                <div class="resume-degree font-weight-bold">{{ $edu->certification }}</div>
                                                <div class="resume-degree-org">{{ $edu->institution }}</div>
                                                <div class="resume-degree-time">{{ $edu->start_year }} - {{ $edu->end_year }}</div>
                                            </li>
                                        @empty
                                            <li class="mb-2">
                                                <div class="resume-degree font-weight-bold">No Education</div>
                                                <div class="resume-degree-org">No Institution</div>
                                                <div class="resume-degree-time">No Time</div>
                                            </li>
                                        @endforelse
                                    </ul>
                                @endif
                            </div>
                        </section><!--//education-section-->
                        <section class="resume-section reference-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Awards</h2>
                            <div class="resume-section-content">
                                @if (Auth::user()->resumeEdus)
                                    <ul class="list-unstyled resume-awards-list">
                                        @forelse (Auth::user()->resumeAwards->sortByDesc('created_at')->take(5) as $award)
                                            <li class="position-relative mb-2 ps-4">
                                                <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
                                                <div class="resume-award-name">{{ $award->title }}</div>
                                                <div class="resume-award-desc">{{ $award->description }}</div>
                                            </li>
                                        @empty
                                            <li class="position-relative mb-2 ps-4">
                                                <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
                                                <div class="resume-award-name">No Awards</div>
                                                <div class="resume-award-desc">No Description</div>
                                            </li>
                                        @endforelse
                                    </ul>
                                @endif
                            </div>
                        </section><!--//interests-section-->
                        <section class="resume-section language-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Language</h2>
                            <div class="resume-section-content">
                                @if (Auth::user()->resumeLangs)
                                    <ul class="list-unstyled resume-lang-list">
                                        @forelse (Auth::user()->resumeLangs->sortByDesc('created_at')->take(5) as $lang)
                                            <li class="mb-2"><span class="resume-lang-name font-weight-bold">{{ $lang->language }}</span> <small class="text-muted font-weight-normal">({{ $lang->level }})</small></li>
                                        @empty
                                            <li class="mb-2"><span class="resume-lang-name font-weight-bold">No Language</span> <small class="text-muted font-weight-normal">(No Level)</small></li>
                                        @endforelse
                                    </ul>
                                @endif
                            </div>
                        </section><!--//language-section-->
                        <section class="resume-section interests-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold mb-3 pb-3">Interests</h2>
                            <div class="resume-section-content">
                                @if (Auth::user()->resumeInterests)
                                    <ul class="list-unstyled">
                                        @forelse (Auth::user()->resumeInterests->sortByDesc('created_at')->take(5) as $interest)
                                            <li class="mb-1">{{ $interest->title }}</li>
                                        @empty
                                            <li class="mb-1">No Interests</li>
                                        @endforelse
                                    </ul>
                                @endif
                            </div>
                        </section><!--//interests-section-->

                    </div>
                </div><!--//row-->
            </div><!--//resume-body-->


        </div>
    </article>

</body>

</html>
