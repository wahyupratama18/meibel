<x-general-layout>
    <section class="bg-gradient-to-br from-sky-600 to-sky-300 p-8 h-screen flex items-center">
        <div class="flex flex-col md:flex-row-reverse md:justify-between items-center gap-16 m-8">
            <img src="{{ asset('img/hero-img.png') }}" alt="Hero Image" class="h-96 animate-bouncing" data-aos="fade-up" data-aos-delay="200">
            <div>
                <h1 class="text-4xl text-white font-bold mb-2">Membantu Belajar dan Raih kampus Impian</h1>
                <h3 class="text-xl text-slate-200">Masa depanmu adalah apa yang kamu lakukan sekarang!</h3>
            </div>
        </div>
    </section>
    <section class="p-8 prose prose-headings:text-sky-500 max-w-none">
        <h2 class="text-center">Selamat datang di Meibel!</h2>
        <p>Meibel merupakan portal edukasi terbaru karya Kelompok 7 Pemrograman Web 2021, yang diasuh oleh Bapak Achmad Hamdan, S.Pd., M.Pd</p>

        <p>Kami menawarkan berbagai layanan materi, soal, hingga pembahasan yang dapat membantu anda meraih Perguruan Tinggi impian kalian</p>

        <h4 class="text-xl">Meibel dalam Angka</h4>

        <div class="flex flex-col md:flex-row gap-4 items-center" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('img/stats.png') }}" alt="Statistics" class="h-48">
            <div class="grid grid-cols-2 gap-6 w-full">
                <div class="bg-sky-500 text-white p-4 rounded-lg">
                    <h5 class="text-2xl">Materi</h5>
                    <span class="text-lg">{{ $materialCount }}</span>
                </div>
                <div class="bg-sky-500 text-white p-4 rounded-lg">
                    <h5 class="text-2xl">Soal</h5>
                    <span class="text-lg">{{ $exerciseCount }}</span>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="p-8 prose prose-headings:text-sky-500 max-w-none">
        <h4>Yuk bertemu dengan pendiri kami!</h4>

        <div class="grid grid-cols-2 gap-4">
            @foreach ($founders as $founder)
                <div class="bg-slate-100 rounded-xl flex items-center shadow p-2 gap-x-2" data-aos="fade-up">
                    <img src="{{ $founder->profile_photo_url }}" alt="Founders Avatar" class="h-28 rounded-full shadow-lg">
    
                    <div class="my-2">
                        <h3 class="mt-0">{{ $founder->name }}</h3>
                        <span>{{ $founder->university?->name }}</span>
                        <hr class="my-2">
                        <div class="grid grid-cols-2 md:grid-cols-10 gap-3">
                            <a href="javascript:void(0)" class="rounded-full aspect-square h-8 bg-stone-50 text-sky-500 hover:bg-sky-600 hover:text-white shadow flex items-center p-2 decoration-transparent">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="javascript:void(0)" class="rounded-full aspect-square h-8 bg-stone-50 text-sky-500 hover:bg-sky-600 hover:text-white shadow flex items-center p-2 decoration-transparent">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="rounded-full aspect-square h-8 bg-stone-50 text-sky-500 hover:bg-sky-600 hover:text-white shadow flex items-center p-2 decoration-transparent">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="javascript:void(0)" class="rounded-full aspect-square h-8 bg-stone-50 text-sky-500 hover:bg-sky-600 hover:text-white shadow flex items-center p-2 decoration-transparent">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</x-general-layout>