<?php 
function get_CURL($url)
{

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
  $result = curl_exec($curl);
  curl_close($curl); 
  
  return json_decode($result, true);

}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC5P2nb8DMBH4QagCGC0vdBw&key=AIzaSyCyonwWpIViudNluB1cgFEyF4QaJnLVFzM');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// letest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCyonwWpIViudNluB1cgFEyF4QaJnLVFzM&channelId=UC5P2nb8DMBH4QagCGC0vdBw&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$LatestVideo = $result ['items'][0]['id']['videoId'];

// instagram api
 
 $clientID = '24093116946960222';
 $accessToken = 'IGAAJqV6Trj41BZAE9KY0ZAjcFpUTllscUxuRmRGcVdJZAWhQc2VoRlFkZAEI2OU9PZA2ZA3VnF1bXBhTFZAWY0pQeXBPYzBMQzlYREhxR3pWbzBTRHVVaGhqcmNYVG1JeTVyQ0lrUjZAfOHZACZA1FNdFFsal9Jdk1PeDB3UTJTUkdoSUx1ZAwZDZD';

 $result = get_CURL('https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=IGAAJqV6Trj41BZAE9KY0ZAjcFpUTllscUxuRmRGcVdJZAWhQc2VoRlFkZAEI2OU9PZA2ZA3VnF1bXBhTFZAWY0pQeXBPYzBMQzlYREhxR3pWbzBTRHVVaGhqcmNYVG1JeTVyQ0lrUjZAfOHZACZA1FNdFFsal9Jdk1PeDB3UTJTUkdoSUx1ZAwZDZD');
 $usernameIG = $result['username'];
 $profilPictureIG = $result ['profile_picture_url'];
 $followersIG = $result ['followers_count'];

//  ig post
$result = get_CURL('https://graph.instagram.com/me/media?fields=id,media_type,media_url&access_token=IGAAJqV6Trj41BZAE9KY0ZAjcFpUTllscUxuRmRGcVdJZAWhQc2VoRlFkZAEI2OU9PZA2ZA3VnF1bXBhTFZAWY0pQeXBPYzBMQzlYREhxR3pWbzBTRHVVaGhqcmNYVG1JeTVyQ0lrUjZAfOHZACZA1FNdFFsal9Jdk1PeDB3UTJTUkdoSUx1ZAwZDZD');

$photos = [];

if (isset($result['data']) && is_array($result['data'])) {
    foreach ($result['data'] as $media) {
        // Filter media_type image
        if ($media['media_type'] == 'IMAGE' || $media['media_type'] == 'CAROUSEL_ALBUM') {
            $photos[] = $media['media_url'];
        }
    }
} else {
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home"> FANI TAMBUNAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#project">Project</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#portfolio">Portfolio</a>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile3.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">FANI TAMBUNAN</h1>
          <h3 class="lead"> Student of Sistem Informasi</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Saya adalah mahasiswa aktif di Universitas Islam Negeri (UIN) Imam Bonjol Padang, Fakultas Sains dan Teknologi, dengan program studi Sistem Informasi. Saat ini, saya sedang menjalani proses pembelajaran yang berfokus pada pengembangan sistem informasi berbasis teknologi serta analisis data dan pemrograman. Kuliah di UIN Imam Bonjol memberikan saya kesempatan untuk memperdalam ilmu di bidang teknologi informasi sekaligus memperkuat nilai-nilai keislaman dalam kehidupan akademik dan sosial.</p>
          </div>
          <div class="col-md-5">
            <p>Saya berasal dari Medan, Sumatera Utara. Sebagai pribadi yang terbiasa hidup di kota besar, saya tumbuh dengan semangat belajar yang tinggi dan adaptif terhadap perubahan. Saya memiliki minat besar dalam dunia teknologi, terutama dalam pengembangan sistem berbasis web dan analisis data. Selain itu, saya juga aktif mengikuti berbagai kegiatan organisasi dan pengembangan diri untuk meningkatkan soft skill dan memperluas jaringan pertemanan.</p>
          </div>
        </div>
      </div>
    </section>


<!-- yotube dan IG -->
 
<section class= "social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Sosial Media</h2>
      </div>
    </div>
        <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?> Subscribers. </p>
            <div class="g-ytsubscribe" data-channelid="UC5P2nb8DMBH4QagCGC0vdBw" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $LatestVideo?>?rel=0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
            <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $profilPictureIG ?>" width="200" class="rounded-circle img-thumbnail">
          </div>
            <div class="col-md-8">
            <h5><?= $usernameIG; ?></h5>
            <p><?= $followersIG; ?> Followers.</p>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <?php foreach ($photos as $photo) : ?>
            <div class="ig-thumbnail">
              <img src="<?= $photo; ?>">
            </div> 
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- project -->
<section class="project bg-light" id="project">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Project</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <!-- Card 1 -->
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/1_.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Menu Hut</h5>
            <p class="card-text">Project Pizza merupakan aplikasi pemesanan pizza sederhana yang saya bangun dengan menggunakan JSON sebagai format penyimpanan dan pertukaran data menu serta detail pesanan.</p>
              <a href="http://localhost/rest_api1/wpu_hut/latihan2.html" class="btn btn-primary" target="_blank">View Project</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/2_.png" alt="Card image cap">
          <div class="card-body text-center">
              <h5 class="card-title">Movie</h5>
            <p class="card-text">Project API Movie menampilkan detail film seperti judul, tanggal rilis, genre, sutradara, dan aktor ketika pengguna mengklik salah satu film.</p>
              <a href="http://localhost/rest_api1/wpu_movie" class="btn btn-primary" target="_blank">View Project</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/3_.png" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Rest Client</h5>
            <p class="card-text">Project Rest Client adalah aplikasi yang menggunakan Guzzle sebagai HTTP client melalui Composer untuk terhubung ke REST API, memungkinkan pengguna menambah, menghapus, dan mengupdate data secara dinamis dengan mudah dan efisien.</p>
              <a href="http://localhost/rest_api1/wpu_rest_client/mahasiswa" class="btn btn-primary" target="_blank">View Project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .custom-button {
    color: black !important;
  }
</style>


<!-- Portfolio -->
      <section class="portfolio bg-light" id="portfolio">
        <div class="container">
          <div class="row pt-4 mb-4">
            <div class="col text-center">
              <h2>Portfolio</h2>
            </div>
          </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4_.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Perkenalkan, saya adalah mahasiswa yang selalu berusaha terlihat sibuk, meskipun kadang kenyataannya sedang menunggu ilham datang lewat notifikasi grup WhatsApp.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5_.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Dalam dunia perkuliahan, saya memiliki prinsip: jika tidak paham, maka cari teman yang paham.Saya juga mempunyai skill utama yang tidak diajarkan di silabus:bertahan hidup di tengah deadline bertubi-tubi.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6_.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Di luar dunia akademik, saya aktif dalam organisasi kampus, meskipun lebih sering terlihat sibuk mengatur rapat daripada benar-benar rapat. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Hubungi saya jika kamu sudah siap untuk menikah hahah.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">JL Besar Buntu Maraja</li>
              <li class="list-group-item">West Sumatera, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>