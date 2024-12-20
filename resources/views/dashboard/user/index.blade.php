<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/assets/css/main.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }

        .vh-100 {
            height: 100vh;
        }

        .container-fluid {
            /* background-color: #ffffff; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            /* border-radius: 8px; */
            /* padding: 20px; */
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .btn-secondary {
            background-color: #ffffff;
            color: #000000;
            border-color: #ced4da;
        }

        .btn-primary {
            background-color: #0E4BF1;
            border-color: #0E4BF1;
        }

        .btn-outline-primary {
            border-color: #0E4BF1;
            color: #0E4BF1;
        }

        .btn-outline-primary:hover {
            background-color: #0E4BF1;
            color: #ffffff;
        }

        .text-primary {
            color: #0E4BF1 !important;
        }

        .custom-radio .custom-control-input:checked~.custom-control-label::before {
            background-color: #0E4BF1;
        }

        .progress-bar {
            background-color: #0E4BF1;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btn-container .btn {
            flex: 1;
            margin: 0 5px;
        }

        .navbar-toggler {
            border-color: rgba(0, 0, 0, .1);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' linecap='round' linejoin='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .nav-item a {
            color: #000 !important;
        }

        .nav-item a:hover {
            color: #0E4BF1 !important;
        }

        .main-content {
            padding-top: 0;
        }

        .tanya {
            font-weight: 600;
        }

        .btn-group-toggle .btn {
            margin-bottom: 10px;
        }
        .cons{
            width: 100%; 
            display:flex; 
            justify-content:end;
        }
        .child-cons{
            width:50%;
            display: flex
        }
        @media (max-width: 768px) {

        }

        @media (max-width: 575.98px) {
            .child-cons{
                width:50%;
                
            }
            .cons{
                justify-content:start;
            }
        }
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">GamerLens</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ asset('/#hero') }}" class="active">Home<br></a></li>
                    @if(Auth::check())
                        <!-- If the user is logged in, show the Diagnosa menu -->
                        <li><a href="{{ asset('/dashboard/diagnosa') }}">Diagnosa</a></li>
                        <li><a href="{{ asset('/dashboard/riwayat') }}">Riwayat Diagnosa</a></li>
                        <li class="dropdown"><a href="#"><span>{{ auth()->user()->nama }}</span>  <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                            {{-- <li><a href="#">Profile</a></li> --}}
                            <li><a href="{{ asset('/logout') }}">Log Out</a></li>
                            </ul>
                        </li>
                        
                    @else
                        <!-- If the user is not logged in, show the Login button -->
                        <li><a class="btn-getstarted flex-md-shrink-0" href="/login">Login</a></li>
                    @endif
                </ul> 
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
    <div class="container-fluid main-content vh-100" >
        <div class="row vh-100">
            <!-- Main Content -->
            <div class="col-md-8 p-4 order-md-2">
                <h6>Dalam sebulan terakhir, seberapa sering kamu...</h6>
                <form id="gejalaForm" action="/kirimcf" method="POST">
                    @foreach ($gejala as $index => $item)
                    @csrf
                    <div class="form-group active" id="question-{{ $index }}" style="display: {{ $index == 0 ? 'block' : 'none' }};">
                        <label class="tanya">{{ $item->nama_gejala }}</label>
                        <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                            <label class="btn btn-outline-danger flex-fill">
                                <input type="radio" id="tidak{{ $index }}" name="{{ $item->id }}" value="0" autocomplete="off" onchange="updateButton()"> Tidak
                            </label>
                            <label class="btn btn-outline-success flex-fill">
                                <input type="radio" id="iya{{ $index }}" name="{{ $item->id }}" value="1" autocomplete="off" onchange="updateButton()"> Iya
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div class="cons">
                        <div class="btn-container child-cons">
                            <button type="button" class="btn btn-outline-primary" id="prevBtn" onclick="prevQuestion()" disabled>Kembali</button>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextQuestion()" disabled>Selanjutnya</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Left Sidebar -->
            <div class="col-md-4 bg-light p-4 order-md-1 d-flex flex-column align-items-center">
                <img src="/img/Picture2.png" alt="Logo" class="mb-4" style="width: 150px;">
                <h2 class="text-primary text-start w-100">Cara Mengisi Kuisioner GamerLens</h2>
                <ol class="text-start w-100">
                    <li>Baca Pertanyaan dengan Saksama.</li>
                    <li>Jawab dengan Jujur.</li>
                    <li>Jawab Semua 14 Pertanyaan.</li>
                    <li>Periksa Kembali Jawaban Anda.</li>
                </ol>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.

2/js/bootstrap.min.js"></script>
    <script>
        let currentQuestionIndex = 0;
        const formGroups = document.querySelectorAll('.form-group');
        const totalQuestions = formGroups.length;

        function showQuestion(index) {
            formGroups.forEach((group, i) => {
                group.style.display = i === index ? 'block' : 'none';
            });
        }

        function nextQuestion() {
            if (currentQuestionIndex < totalQuestions - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
                updateButton();
            }
        }

        function prevQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
                updateButton();
            }
        }

        function updateButton() {
            const prevButton = document.getElementById('prevBtn');
            const nextButton = document.getElementById('nextBtn');
            const currentQuestion = formGroups[currentQuestionIndex];
            const radioButtons = currentQuestion.querySelectorAll('input[type="radio"]');

            let isAnyChecked = false;
            radioButtons.forEach((radio) => {
                if (radio.checked) {
                    isAnyChecked = true;
                }
            });

            if (isAnyChecked) {
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextButton.textContent = 'Submit';
                    nextButton.setAttribute('type', 'submit');
                    nextButton.removeAttribute('onclick');
                } else {
                    nextButton.textContent = 'Selanjutnya';
                    nextButton.setAttribute('type', 'button');
                    nextButton.setAttribute('onclick', 'nextQuestion()');
                }
                nextButton.removeAttribute('disabled');
            } else {
                nextButton.setAttribute('disabled', 'true');
            }

            if (currentQuestionIndex === 0) {
                prevButton.setAttribute('disabled', 'true');
            } else {
                prevButton.removeAttribute('disabled');
            }
        }

        showQuestion(currentQuestionIndex);
        updateButton();
    </script>
    <script src="/assets/js/main.js"></script>
</body>

</html>