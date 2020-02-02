<div class="form">
    <form method="POST" action="page/nomer_proses.php">
    <table>
        <tr>
            <?php
            if(empty($_GET['alert'])){
                echo "";
            }else if($_GET['alert']=='1'){
                echo "Jumlah Kelompok dan Jumlah Nama tidak boleh kosong.";
            }else{
                echo "";
            }
            ?>
        </tr>
        <tr>
            <td>
                <label for="nama"><span>Jumlah Kelompok </span>
            </td>
            <td>:</td>
            <td>
                <input style='width:90%' type="number" name="jml_kel" placeholder='Masukkan Jumlah Kelompok..' value="">
            </td>
        </tr>
        <tr>
            <td>
                <label for="nama"><span>Jumlah Nama </span>
            </td>
            <td>:</td>
            <td>
                <input style='width:90%' type="number" name="jml_nama" placeholder='Masukkan Jumlah Nama..' value="">
            </td>
        </tr>
        <tr>
            <td style='40%'>
                <br>
                <button type="submit" name='tampil'><Table>Tampilkan</Table></button>
                <button type='submit' name='reset'>reset</button>
            </td>
        </tr>
    </table>
    </form>
    <br>
    <form method="POST" action="page/nomer_proses.php">
        <fieldset>
            <legend>Mulai Random Nama</legend>
            <table border="0">
                <?php
                if(empty($_SESSION['nama'])){
                    echo "";
                }else{
                    $obj->jml_kel($_SESSION['nama']); 
                }
                ?>
            </table>
            <br>
            <?php
            if(empty($_SESSION['nama'])){
                echo "";
            }else{
                echo "
                <button type='submit' name='acak'>Acak</button>
                ";
            }
            ?>
        </fieldset></br>
    </form>
    <fieldset>
        <legend>Hasil</legend>
        <?php
            if(empty($_GET['hasil'])){
                echo "";
            }else if($_GET['hasil']=='data'){
                echo "
                    <table>";
                        $obj->tampil_nama();
                echo "
                    </table>
                ";
            }else{
                echo "<meta http-equiv='refresh' content='0; ../index.php?page=nama' />";
            }
        ?>
    </fieldset>
</div>