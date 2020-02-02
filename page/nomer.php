<div class="form">
    <form method="POST" action="page/nomer_proses.php">
        <fieldset>
            <legend>Mulai Random Nomor</legend>
            <table border="0">
                <tr>
                    <td>
                        <label for="awal"><span>Nomor Pertama</span></label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="number" name="awal" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="akhir"><span>Nomor Akhir <span class="required"></span></span></label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="number" name="akhir" />
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" name='submit'>Acak</button>
            <button type='submit' name='reset'>reset</button>
        </fieldset>
    </form>
    <fieldset>
        <legend>Hasil</legend>
        <?php
        if(empty($_SESSION['hasil'])){
            echo "";
        }else{
            echo "
            <table>
                <tr>
                    <td>
                        Dari
                    </td>
                    <td>
                        =
                    </td>
                    <td>
                        ".$_SESSION['awal']."
                    </td>
                </tr>
                <tr>
                    <td>
                        Sampai
                    </td>
                    <td>
                        =
                    </td>
                    <td>
                        ".$_SESSION['akhir']."
                    </td>
                </tr>
                <tr>
                    <td>
                        Hasil Acak
                    </td>
                    <td>
                        =
                    </td>
                    <td>
                        ".$_SESSION['hasil']."
                    </td>
                </tr>
            </table>
            ";
        }
        ?>
    </fieldset>
</div>