<?php
session_start();
error_reporting(0);
class randomize{
    private $menu=array("Nomer","Nama");
    private $link=array("nomer","nama");
    private $kelompok=array();
    private $nama=array();
    private $wadah=array();
    public function menu_zero(){
        for($j=0;$j<count($this->link);$j++){
            echo "
            <li>
                <a href='?page=".$this->link[$j]."'>
                    <p>".$this->menu[$j]."</p>
                </a>
            </li>
            ";
        }
    }
    public function menu(){
        $getLink=$_GET['page'];
        //ambil data dari array link
        for($i=0;$i<count($this->link);$i++){
            //samakan data link yang dipilih oleh user dengan data yg ada pada penyimpanan array, jika data sama ambil semua data array lalu
            if($getLink==$this->link[$i]){
                for($j=0;$j<count($this->link);$j++){
                    //cek jika data yg dipilih user sama dengan data yang ada pada array, maka aktifkan style menu-active
                    if($getLink==$this->link[$j]){
                        echo "
                        <li>
                            <a class='aktif' href='index.php?page=".$this->link[$j]."'>
                                <p>".$this->menu[$j]."</p>
                            </a>
                        </li>
                        ";
                    }else{
                        echo "
                        <li>
                            <a href='index.php?page=".$this->link[$j]."'>
                                <p>".$this->menu[$j]."</p>
                            </a>
                        </li>
                        ";
                    }
                }
            //jika tidak sama tampilkan null
            }else{
                echo "";
            }
        }
    }
    public function link(){
        if(empty($_GET['page'])){
            echo "
                <h2>HOME</h2>
            ";
        }
        else if($_GET['page']=='nomer'){
            echo "
                <h2>NOMER</h2>
            ";
        }
        else if($_GET['page']=='nama'){
            echo "
                <h2>NAMA</h2>
            ";
        }
    }
    public function index(){
        echo "
            <table class='home'>
                <tr>
                    <td colspan='2'>
                        <br><br>
                        <h2>Tujuan</h2>
                        <hr/>
                        <p>
                            Untuk Mempermudah dalam pemilihan kelompok baik dari segi Nama kelompok langsung atau melalui nomer.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Acak Kelompok</h4>
                        <img src='img/teamwork.png' alt='kelompok_gambar'/>
                        <p>
                        Formulir ini memungkinkan Anda untuk menghasilkan string teks acak. Keacakan berasal dari kebisingan atmosfer, 
                        yang untuk banyak tujuan lebih baik daripada algoritma angka pseudo-acak yang biasanya digunakan dalam program komputer.
                        </p>
                    </td>
                    <td>
                        <h4>Acak Nomer</h4>
                        <img src='img/randomize.png' alt='nomer_gambar' />
                        <p>
                        Formulir ini memungkinkan Anda untuk menghasilkan bilangan bulat acak. Keacakan berasal dari kebisingan atmosfer, 
                        yang untuk banyak tujuan lebih baik daripada algoritma angka pseudo-acak yang biasanya digunakan dalam program komputer.
                        </p>
                    </td>
                </tr>
            </table>
        ";
    }
    public function acak_nomer($awal,$akhir){
        $_SESSION['hasil']=rand($awal,$akhir);
    }
    public function jml_kel($nama){
        //ambil data parameter ulang hingga < jumlah parameter
        $no=1;
        for($j=0;$j<$nama;$j++){
            echo "
            <tr>
                <td>
                    <label for='nama'><span>Nama ke-$no <span class='required'></span></span></label>
                </td>
                <td>:</td>
                <td>
                    <input type='text' class='input-field' name='nama$j' placeholder='Masukkan Nama...' required/>
                </td>
            </tr>
            ";
            $no++;
        }
        echo "<br>";
    }
    public function simpan_nama(){
        //simpan hasil post kedalam array
        for($j=0;$j<$_SESSION['nama'];$j++){
            $this->nama[$j]=$_POST["nama".$j];
        }
        //acak
        shuffle($this->nama);
        for($i=0;$i<$_SESSION['nama'];$i++){
            $_SESSION['nama_kel'.$i]=$this->nama[$i];
        }
    }
    public function tampil_nama(){
        //bagi jumlah nama yang terdaftar dengan jumlah kelompok, lalu bulatkan keatas
        $bagi=ceil($_SESSION['nama']/$_SESSION['jml_kel']);
        $no=1;
        //variabel inisial agar dapat mengulang
        $b=0;
        //ulang sampai batas jumlah kelompok yang terinput
        for($j=0;$j<$_SESSION['jml_kel'];$j++){
            echo "
            <tr>
                <td>
                    Kelompok-$no
                </td>
            </tr>
            ";
            //ulang sampai batas jumlah nama yang terinput
            for($i=0;$i<$_SESSION['nama'];$i++){
                echo "
                <tr>";
                //jika perulangan mencapai hasil pembagian kelompok tampilkan
                if($i<$bagi){
                    echo 
                    "<td>".$_SESSION['nama_kel'.$b]."</td>";
                    $b++;
                }
                echo "
                </tr>
                ";
            }
            $no++;
        }
    }
}
?>