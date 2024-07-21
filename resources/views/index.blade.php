@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i> Beranda</a></li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img class="img-responsive pad" src="{{ asset('adminlte/dist/img/photo-profile1.jpeg') }}" alt="First slide" style="height: 450px; width:100%;">
                    </div>
                    <div class="item">
                        <img class="img-responsive pad" src="{{ asset('adminlte/dist/img/photo-profile2.jpeg') }}" alt="Second slide" style="height: 450px; width:100%;">
                    </div>
                    <div class="item">
                        <img class="img-responsive pad" src="{{ asset('adminlte/dist/img/photo3.jpg') }}" alt="Third slide" style="height: 450px; width:100%;">
                    </div>
                </div>

                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="login-logo">
                    <b>MTS N 2 SLEMAN</b> <br>
                    {{-- {{ bcrypt('password') }} --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="attachment-block clearfix">
                <div class="col-sm-4">
                    <img class="img-responsive" src="{{ asset('adminlte/dist/img/photo-profile2.jpeg') }}" alt="Attachment Image"
                        style="width: 250px">
                </div>
                <div class="col-sm-8">
                    <div class="attachment-pushed" style="margin-left:0 !important;">
                        <div class="attachment-text">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MTS Negeri 2 Sleman merupakan sekolah menengah pertama negeri dibawah 
                            naungan Kementrian agama yang berdiri sejak tahun 1968 dan berlokasi di Jalan 
                            Magelang Km. 17 Ngosit, Margorejo, Tempel, Sleman, Yogyakarta. sekolah ini sudah 
                            mendapatkan akreditasi “A” berdasarkan sertifikat 05.01/BAN-SM-P/TU/IX/2018.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adapun fasilitas yang disediakan oleh pihak MTS Negeri 2 Sleman untuk para 
                            siswa yaitu ruang kelas yang memadai, ruang lab ipa, mushola, perpustakaan, ruang 
                            lab komputer, ruang musik, lapangan basket, dan lain-lain. MTS Negeri 2 Sleman juga menyediakan program kesiswaan untuk mengembangkan bakat dan minat siswanya 
                            secara akademik dan non akademik diantaranya seperti drumband, tonti, PMR, pencak 
                            silat, pramuka, program tahfidz, dan lain-lain. Pihak madrasah sangat mengapresiasi 
                            para siswa yang berprestasi baik secara akademik dan nonakademik dengan 
                            memberikan penghargaan kepada siswanya. <br>
                            <h3>Visi Madrasah</h3>
                            Terwujudnya siswa yang Mandiri, Unggul, Terampil, Islami, Alim, Rajin dan Amanah serta berwawasan lingkungan (MUTIARA BERWAWASAN LINGKUNGAN)<br>
                            <h3>Misi Madrasah</h3>
                            1.Melaksanakan kegiatan belajar mengajar yang menyenangkan,kreatif dan inovatif untuk menumbuhkan kemandirian dan prestasi siswa
                            2.Melaksanakan kegiatan pengembangan diri untuk mewujudkan siswa yang unggul dalam akhlak mulia, olahraga dan seni<br>
                            3.Melaksanakan pembinaan agar siswa terampil dan rajin dalam beribadah, terampil berolahraga dan terampil mengoperasikan komputer<br>
                            4.Memberikan keteladan bagi siswa agar gemar berinfaq, sedekah dan peduli kepada orang lain serta gemar membaca Al-Qur’an<br>
                            5.Memberikan keteladan bagi siswa agar jujur dalam ucapan, perilaku serta menjauhi sikap berbohong dan rekayasa<br>
                            6.Melaksanakan pembinaan siswa putra agar menjadi mu’adzin<br>
                            7.Mengembangkan dan mengoptimalkan kegiatan mapel agama agar siswa menguasai ilmu agama yang cukup dan berakhlak mulia<br>
                            8.Menumbuhkan semangat belajar yang berkesinambungan<br>
                            9.Meningkatkan pembelajaran efektif, tuntas minimal tercapai dengan kelulusan 100 % serta nilai rata-rata UN dan UAMBN meningkat<br>
                            10.Meningkatkan kepedulian terhadap lingkungan dengan gerakan penghijauan<br>
                            11.Menerapkan perilaku hidup sehat dan ramah lingkungan<br>
                            12.Membangun karekter siswa peduli lingkungan, dan berbudaya bersih<br>   
                        </div>
                        <!-- /.attachment-text -->
                    </div>
                </div>
                <!-- /.attachment-pushed -->
            </div>
        </div>
        <br>
        <br>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-product').DataTable();
    </script>
@endsection
