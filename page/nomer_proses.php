<?php
require('../function.php');
$proses=new randomize;
if(isset($_POST['submit'])){ //jika user menekan tombol submit
    //jadikan sesi untuk hasil input POST form yang bernama awal
    $_SESSION['awal']=$_POST['awal'];
    //jadikan sesi untuk hasil input POST form yang bernama akhir
    $_SESSION['akhir']=$_POST['akhir'];
    //panggil fungsi acak nomer dimana angka awal diambil dari var sesi awal dan angka akhir diambil dari var sesi akhir
    $proses->acak_nomer($_SESSION['awal'],$_SESSION['akhir']);
    //arahkan ke halaman index yang var pagenya adalah nomer
    echo "<meta http-equiv='refresh' content='0; ../index.php?page=nomer' />";
}else if(isset($_POST['tampil'])){ //jika user menekan tombol tampil
    if(empty($_POST['jml_kel'])&&empty($_POST['jml_nama'])){
        echo "<meta http-equiv='refresh' content='0; ../index.php?page=nama&alert=1' />";
    }else{
        //jadikan session untuk hasil input POST form yg bernama jml_kel
        $_SESSION['jml_kel']=$_POST['jml_kel'];
        //jadikan session untuk hasil input POST form yg bernama jml_nama
        $_SESSION['nama']=$_POST['jml_nama'];
        //arahkan ke halaman index yang var pagenya adalah nama
        echo "<meta http-equiv='refresh' content='0; ../index.php?page=nama' />";
    }
}else if(isset($_POST['acak'])){ //jika user menekan tombol acak
    //panggil fungsi simpan_nama
    $proses->simpan_nama();
    //arahkan ke halaman index yang var pagenya adalah nama dan var hasilnya adalah data
    echo "<meta http-equiv='refresh' content='0; ../index.php?page=nama&hasil=data' />";
}else if(isset($_POST['reset'])){ //jika tombol reset diklik
    //hancurkan sesi
    session_destroy();
    //arahkan ke halaman index yang var pagenya adalah sesi akhir dari link
    echo "<meta http-equiv='refresh' content='0; ../index.php?page=".$_SESSION['link']."' />";
}
?>