1-index.php file ochamiz va unga bootstrap va js kod ni ulaymiz.(CDN via jsDelivr )Bootstrapni

<head>ni ichiga yozamiz</head>
js kod ni esa

<body> tegini eng pastiga yozamiz</body>
2-assets papka ochamiz,ichida style.css file ochamiz ichiga bosh sahifa uchun tanlangan bootstrap page ni source ni ochib
{ figurni qavs ni ichidagi css kodlarni copy qilib } style.css ni ichiga qo'yamiz.
Agar
<link href="breadcrumbs.css" rel="stylesheet"> link bo'lsa ichidagi css kodlarni copy qilib uni ham style.css ni ichiga qo'yamiz.

option+shift+f - kodlarni tartiblab beradi.
option+command+u - source code larni ochib beradi

Includes->header,footer,navbar larni yaratish

Endi boshqa page lar yaratmoqchi bo'lganimizda bizda navbar va footer qismlari bir xil bo'lishi kk, faqat main qismi ozgaradi.
Shuning uchun includes papka ochib ichiga navbar.php,header.php,footer.php file larini ochamiz.index.php da tepadan
</header> gacha qismini qirqib olamiz,header.php ni ichiga qo'yamiz. index.php da qirqilgan qismni o'rniga
<?php require 'includes/header.php' ?> ni yozamiz.
kn index.php file dan <footer> pastini qirqib olib includes papkani ichida footer.php file yaratib ichiga qo'yamiz va saqlaymiz.
  index.php file da esa uning o'rniga <?php require 'includes/footer.php' ?>; ni yozamiz.
  Diqqat barcha html kodlarimiz yopilishiga etibor bering.

  navbar.php file yaratib,header.php file imizni ichidagi kodlarni soddalashtiramiz. buning uchun <header> </header>
  teg larini ichidagi nav bn boshlanuvchi kodlarimizni qirqib navbar.php ni ichiga qoyamiz va saqlaymiz.
  header.php ni ichida <header> <?php require 'navbar.php' ?> </header> ni yozib chaqirib qo'yamiz va saqlaymiz. tekshiramiz
  hammasi joyida.

  Navbarimizni o'zgartirib o'imizga moslaymiz shunda kodlarimiz aralashib ketmaydi.
  <link href="breadcrumbs.css" rel="stylesheet"> manashunaqa file dagi css kodlarimizni ham olib style.css ga qo'yib ketish kk.

  hammasi joyida.

  Navbarimizdagi link larmizga o'zimizga moslab nom berib oldik.

  Html kodlarimizga PHP kolarmizni aralshtirishni boshlaymiz.

  index.php dagi php kodimizni ichiga $title o'zgaruvchiga 'bosh sahifa' ni tenglashtirib oldik.
  <?php
  $title = 'Bosh sahifa';
  require 'includes/header.php'
  ?>

  header.php file ga o'tib <title> <?= $title ?? 'PHP blog' ?> </title> agar $title o'zgaruvchimiz page ga berilmagan bo'lsa
  default shaklda PHP blog so'zi chiqib tursin,echo qilib bosh sahifamizni dynamic usulda chaqirib oldik.

  About us file mizni yaratamiz va
  <?php
  $title = 'About Us';
  require 'includes/header.php';
  ?> o'zgaruvchi beramiz,va require qilib oldik.

  <?php
  require 'includes/footer.php'
  ?>

  pastga tushib footerni ham chaqirib olamiz.

  Contact Us file mizni yaratamiz va
  <?php
  $title = 'Contact Us';
  require 'includes/header.php';
  ?> o'zgaruvchi beramiz,va require qilib oldik.

  <?php
  require 'includes/footer.php'
  ?>

  pastga tushib footerni ham chaqirib olamiz.


  POST YARATISH ni - shuyerdan boshlaymiz

  post-create.php file yaratamiz - bu post yaratish uchun,
  index file dan "post yaratish"ni bosganimizda "post-create.php" o'tib ketishini href=""ga yozib qo'yamiz.
  endi bizga form kk bo'ladi.docs->forms->form-control dan bittasini tanlemiz.Formni orqasidagi kulrang
  to'rtburchakni olish uchun "Jumbotron" dan bittasini tanladim va kk siz joylarini olib tashlab o'rniga
  tanlangan form ni ichidagi dv ni qo'ydim,container class idegi dv ni form ga o'zgartirdim. input larni type ni
  text ga o'zgartirib,tepadagi div dan nusxa olib yana 2 ta qo'shdim.input larga name="" beramiz

  method - malumotlar bazasiga malumotlar yuborish va o'zgartirishda "POST"metodidan foydalanamiz. yuqoridagi
  form ni ichiga method="POST" yozamiz.action="" qayerga jonatishni esa bo'sh qoldiramiz shu page da qolsin.

  post-create.php page imizni boshidagi <?php ?>ni ichiga shartimizni yozamiz,
  yani, agar serverdagi request metodi teng bo'lsa POST ga - kodni bajar,degan logikamizni yozamiz.

  if($_SERVER['REQUEST METHOD'] == 'POST'){
  //KODNI BAJAR/var_dump($_POST) qilib tekshirib ko'ramiz. ok.
  }


  MA'LUMOTLAR BAZASINI YARATISHNI BOSHLAYMIZ
  Saytdan turib ma'lumotlarni bazaga jo'natishni o'rganamiz.

  XAMP orqali phpmyadmin ga kiramiz uyerdan php-blog nomli database-ma'lumotlar baza sini yaratamiz.
  Uning ichida Prices nomli table-jadval yaratamiz. 5 ta ustun yaratamiz.NAME ga id,nomi,xaqida,made_in made_at,
  TYPE ga integer,varchar,text,varchar,datetime,idga type-integer index-primary A-I-ni belgilemiz,
  LENGHT ga nomi ga 255 ni va made_at ga current_time ni belgilemiz.

  if($_SERVER['REQUEST METHOD'] == 'POST'){
  //KODNI BAJAR/var_dump($_POST) qilib tekshirib ko'ramiz. ok.
  } mana shu kod orqali ma'lumotlarimiz ketyapti endi shu ma'lumotlarni ushlab olishimiz kk, undan oldin
  PHP programmamizni ma'lumotlar bazasiga ulaymiz.Buning uchun avval database.php file yaratamiz,
  ichida malumotlar bazasiga ulash uchun PDO kod yozamiz.
  w3school.com-> PHP->MySQL database->MySQL connect->PDO ni topib copy qilib database.php ga qo'yamiz.

  <?php
  $servername = "localhost";
  $username = "username";
  $password = "password";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
  ------------------------------------------------------------------------------------
  qo'yganimizdan so'ng quyidagilarni o'zgartiramiz.

  $servername = "localhost"; "127.0.0.1" - bo'lishi mumkin.
  $username = "username"; "root"- bo'ladi
  $password = "password"; ""- bo'sh qoladi agar yozilgan bo'lsa o'shani yoziladi
  $databse = "php-blog" bu qo'shildi va dbname=myDB->$database ga o'zgartirildi.

  post-create.php page da require 'database.php' qilamiz. shu bn bazaga ulandik endi ma'lumotlarni bazaga saqlaymiz.

  quyidagi kodimizni ichiga kod yozamiz.
  if($_SERVER['REQUEST METHOD'] == 'POST'){

  $_POST post super globalimizdan kelayotgan so'rov orqali name larimizni shu nomli o'zgaruvchiga tenglashtirib qo'yamiz.
  $nomi = $_POST['nomi'];
  $xaqida = $_POST['xaqida'];
  $made_in = $_POST['made_in'];
  $made_at = $_POST['made_at'];

  malumotlarni oldik endi ularni bazaga saqlaymiz.
  MSQL INSERT bor shhularni bazaga saqlaymiz. bizda $pdo objecti bor,shuni birorta o'zgaruvchiga tenglashtiramiz va uni
  prepare qilamiz,msln $statement = $conn->prepare("INSERT kodimizni yozamiz")

  $statement = $conn -> prepare("INSERT INTO prices (nomi,xaqida,made_in,made_at) VALUES (:nomi,:xaqida,:made_in,:made_at)");
  $statement -> execute([
  'nomi' => $nomi;
  'xaqida' => $xaqida;
  'made_in' => $made_in;
  'made_at' => $made_at

  ]])
  echo "Post yaratildi";
  }

  ESLATMA - database dagi $conn ni $pdo ga o'zgartirilgan edi shunda xatolik chiqdi.to'g'irlab qo'yamiz.
  Postni yaratganimizdan so'ng shu page da qolib ketmasin balki Home/bosh sahifaga yoki ozimiz xoxlagan pagega otib yuborsin.
  yuqoridagi echo "Post yaratildi"; - ni o'chirib yuboramiz va o'rniga kod yozamiz.
  header("location:index.php"); ni yozamiz.

  flash message yaratishni o'rganamiz,buning uchun session dan foydalanamiz.Bunda xabar ekranda bir marta ko'rinadi xolos.
  session_start beramiz buni header.php ga yozsak header bizni hamma page larimizda bor.

  post-create.php ga qaytamiz va header("location:index.php") u yoqqa jo'natib yuborishdan oldin
  $_SESSION['post-yaratildi'] o'zgaruvchimizga ma'lumot yozamiz,uning nomini post-yaratildi deymiz.
  uni 'Post muvaffaqiyatli yaratildi'ga tenglaymiz. $_SESSION['post-yaratildi'] = 'Post muvaffaqiyatli yaratildi';
  session dan kn header location bizni index.php page imizga otvaradi.
  biz index.php page imizga o'tamizda shu yerda tekshiramiz.buning uchun bootstrap->components->alert->success
  <div class="alert alert-success" role="alert">
    A simple success alert—check it out!
  </div>
  ni
  copy qilamiz va index.php da <div class="container">ni pastiga qo'yamiz.
    Endi agar session da o'sha narsa bo'lsa mana buni chiqar degan kod yozishimiz kk.html kodimizni ichida php kod yozamiz.
    php ichida if ishlatganimizda figurali qavs o'rniga : ikki nuqta qo'yishni esdan chiqarmaslik kk.
    Agar session da 'post-yaratildi' isset-bo'lsa,

    <?php if (isset($_SESSION['post-yaratildi'])) : ?> Agar session da 'post-yaratildi' isset-bo'lsa :

      <div class="alert alert-success" role="alert">
        <?= $_SESSION['post-yaratildi'] ?>; shu session dagi so'zni ekranga chiqar.
        <?php unset($_SESSION['post-yaratildi']) ?> va session ni ekrandan olib tashla
      </div>

    <?php endif; ?> ; if li gapimizni tugatish.


    Bazadagi post larimizni dynamic usulda olib ularni ro'yxatini chiqaramiz.


    birinchi php kodimizni ichiga require database.php qilib chaqirib olamiz. va $conn o'zgaruvchimiz
    orqali bazadan malumotlar select qilib olamiz.Kn execute qilamiz.

    $statement = $conn->prepare(SELECT * FROM prices);
    $statement->execute();

    $prices = $statement->fetchAll(); prices table imizdagi hamma malumotlarni olgin dedik.
    var_dump($prices[0]) tekshirib olamiz.(hammasi yaxshi).


    index.php dagi html postlarimizning bittasini qoldirib foreach ga olamiz,qolganini o'chiramiz.

    <?php foreach ($prices as $price) : ?>

      postimizni shu foreach ni ichiga yozamiz.

      <?php endforeach ?>;
      hammasi joyida ishladi.
      $price degani bitta array degani.
      Ma'lumotlarimizni dynamic usulda chaqiramiz buning uchun.
      <h5><?= $price['nomi'] ?></h5>;
      <p><?= $price['about'] ?></p>;
      <h5><?= $price['made_in'] ?></h5>;
      <h6><?= $price['made_at'] ?></h6>;
      kabi bittalab moslab yozamiz. Hammasi yaxshi.


      Post ni ko'rish

      Php kodimizni ichiga kodlarimizni yozamiz,pagemizni nomladik,header imizni va footer imizni chaqirdik
      <?php
      $title = 'Postni ko\'rish';
      require 'includes/header.php'
      ?>
      bu yerga div ochamiz va class ga container berib ichiga ozimizga moslab bootstrap dan kod copy qilib qo'yamiz
      css file i bo'lsa style.css ni ichiga copy/paste qilamiz. bu bizga postimizni ko'rish ga kk bo'ladi. O'zimizga
      moslaymiz.

      <div class="container">
        <h1 class="text-body-emphasis">Get started with Bootstrap</h1>
        <p class="fs-5 col-md-8">Quickly and easily get started with Bootstrap's compiled, production-ready files with
          this barebones example featuring some basic HTML and helpful links. Download all our examples to get started.</p>

        <div class="mb-5">
          <a href="/docs/5.3/examples/" class="btn btn-primary btn-lg px-4">Download examples</a>
        </div>

        <hr class="col-3 col-md-2 mb-5">

      </div> bo'ldi.

      <?php require 'includes/footer.php' ?>;

      Endi index.php ga o'tib h4 tegimizni post.php file ga yo'naltiradigan link qilishimiz kk. yo'naltiryatgan paytimizda
      biz bosayotgan link ni ma'lumotlarini uning id si orqali topib oladi.biz shu id ni parametr qilib berib yuboryapmiz.
      shu yerda biz get request metodidan foydalanayapmiz,kn <h4><?= $price['nomi'] ?></h4> ni a tegini ichiga olib quyidagicha yozdik.

      <a href="post.php?id=<?= $prices['id'] ?>">
        <h4><?= $price['nomi'] ?></h4>
      </a>

      bo'ldi,natijani ko'rsak yaxshi.endi URL imizni ko'rsak,bizni post.php ga o'tkazyapti va ?id=1 kabi chiqyapti.
      yani bizga shu postimizni id isini ko'rsatib berdi.endi bazaga so'rov yuboramiz shu id lik post izni olib kel deb
      so'rov yuboramiz va ekranga chiqaramiz.
      post.php file imizda php kodimizni ichiga 'require database.php'; qilamiz,
      get super globali orqali url dagi id gimizni ovalamiz.
      $id = $_GET['id'];
      kn bazaga ulanish va sql select kodimizni yozamiz

      $statement = $conn->prepare("SELECT * FROM prices WHERE id = ? ")
      $statement->execute([$id]);

      agar bizada ko'p parametrlar bo'lsa ? so'roq ni o'rniga quyidagicha yozamiz.

      $statement = $conn->prepare("SELECT * FROM prices WHERE id = :id ")
      $statement->execute(['id'=>$id]);

      kn statement->fetch() bitta-bitta olib kel deymiz.
      $prices = $statement->fetch(); $prices ga tenglab olyapmiz va uni ekranga echo qilyapmiz.
      var_dump($prices['$id']) qilib tekshiramiz. Zor.


      POST imizni o'chirish


      Delete post request bo'ladi.index.php file mizda delete button bor type ni submit ga o'zgartiramiz
      shuni <form>tegimizni orasiga olib qo'yamiz,
        form ga method="POST" yozamiz,action yozmimiz sababi o'chgan paytda shu page da qolaveradi.
        ichiga <input type='hidden' name="delete"> yashirin tarzda o'chsin
        yana bitta price ni id sini jo'natish un <input type="hidden" name="prices_id" value="<?= $prices['id'] ?>">
        o'chirmoqchi bo'lgan postimizni id orqali topib o'chiradi.
        <form method="POST">
          <input type='hidden' name="delete">
          <input type="hidden" name="prices_id" value="<?= $prices['id'] ?>">
          <button type="submit"> bu yerda button bo'ladi</button>
        </form>

        ochirganimizda page mizni xuddi shu page ni o'ziga jo'natyapmiz shuning uchun php kodimizni ichiga
        if li kodimizni yozamiz. Ya'ni
        agar serverimizdagi request metodi teng bo'lsa post ga va postni ichida delete bo'lsa {ushbu shartni bajar}

        if($_SERVER['REQUEST_METHOD'] = "POST" && isset($_POST['delete'])){
        ushbu shartni bajar.delete so'rovini yozamiz.

        $prices_id = $_POST['prices_id']; postimizni id sini ovalamiz.
        $statement = $conn->prepare("DELETE FROM prices WHERE id = ?");bu yerda o'chirishga tayyorlemiz
        $statement->execute([$prices_id]);bu yerda esa ochiramiz.


        header("Location:index.php");hadeb form bizga qayta-qayta sorov yubormasligi uchun.

        }
        o'chirishimizdan oldin bizdan so'rasin buning uchun form tegimizning ichiga
        onSubmit="return confirm('rostdan o\'chsinmi?')" deb yozib qo'yamiz.

        muvaffaqiyatli o'chirildini chiqarish.

        Agar session da post-o\'chirildi so'zi bo'lsa, session ishga tushsin va unset bn tugasin deymiz.
        tepadagi sessionda copy olib moslab olamiz.
        <?php if (isset($_SESSION['post-o\'chirildi'])) : ?>

          <div class="alert alert-success" role="alert">
            <?= $_SESSION['post-o\'chirildi'] ?>
            <?php unset($_SESSION['post-o\'chirildi']) ?>
          </div>

        <?php endif; ?>
        
        kn esa session imiz shu index.php page da bo'layotganligi uchun php kodimizni ichida session ni
        $_SESSION['post-o\'chirildi'] = 'Post muvaffaqiyatli o\'chirildi'; yozamiz
        faqat header("Location:index.php"); dan oldin yozishimiz kk.uning pastiga koddan chiqish uchun 
        exit; ni yozib qo'yamiz. bo'ldi.
        Endi kodni qisqartiramiz chunki if li session imiz ko'payib ketyapti. biz index.php da bitta if li session 
        qatnashgan kodimizni yozdik uni shartli qismi bir xil bo'ladi va unga tenglashtirilgan qismi esa 
        har bir page da boshqacha bo'ladi.Misol uchun bu page da ham $_SESSION['success'] bor bo'lsa uni tenglashtiramiz
        Misol uchun $_SESSION['success'] = 'post o'zgartirildi'.


        Postni o'zgartirish



      yangi fayl ochamiz post-edit.php va post-create.php file dan barcha narsani copy qilib olib buni ichiga tashlemiz.
      Kn index.php file da edit button nini a linkga o'zgartiramiz va href="/post-edit.php?id=<?= $prices['id'] ?>" 
      qilib qaysi id lik post ni edit qilishimizni bilib olamiz. Kn post-edit.php ga o'tib kkli joylarini o'zgartiramiz.
      URL dan id sini ovalamiz,buni php kodimizda yozamiz $prices_id = $_GET['id']; endi malumotlar bazasidan shu 
      shu id ni olibkelamiz. 
      bu post.php dagi bn bir xil yani
      $statement = $conn->prepare("SELECT * FROM prices WHERE id = ? ");
      $statement->execute([$prices_id]);
      $prices = $statement -> fetch();
      

      endi xar bir input imizga mos ravishda id larimizni kiritib chaqirib olamiz value="<?= $prices['nomi'] ?>" kabi.
      kn o'zgartirmoqchi bo'lgan nomi,xaqida... larni o'zgartirgandan kn jo'natishni bosganimizda form PUT zapros 
      jo'natadi,browser lar PUT qabul qilmedi,faqat GET va POST, shuning uchun form tegining pastidainput ochib 
      
      type="hidden" name="PUT" yozamiz.shu yerda id sini ham ovalishimiz kk shuning uchun yana bitta input ochamiz
      <input type="hidden",name="prices_id" value="<?= $prices['id'] ?>" > yozamiz.
      xosh, kn Agar serverimizdagi request method imiz post ga teng bo'lsa
      VA postimizni ichida PUT bo'lsa ($_POST['PUT']) ni qo'shamiz. kn shartiga boyagi inputdan jo'natgan value="<?= $prices['id'] ?>"
      ni qabul qilib olamiz $id = $_POST['prices_id'] ni qo'shamiz.
       query ga UPDATE beramiz quyidagicha yozamiz.nomlangan parametrlar beramiz.

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])) {

$id = $_POST['prices_id'];
$nomi = $_POST['nomi'];
$xaqida = $_POST['xaqida'];
$made_in = $_POST['made_in'];
$made_at = $_POST['made_at'];

$statement = $conn->prepare("UPDATE prices SET nomi = :nomi,xaqida = :xaqida,made_in = :made_in,made_at = :made_at WHERE id = :id ");
$statement->execute([
    'id' => $id,
    'nomi' => $nomi,
    'xaqida' => $xaqida,
    'made_in' => $made_in,
    'made_at' => $made_at,

]);

$_SESSION['success'] = 'Post muvaffaqiyatli o\'zgartirildi';

header("Location:index.php");        bosh sahifaga yo'naltiramiz va undan kn har doim exit;yozilishi shart.
exit; 
}

        
        








