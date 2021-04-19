<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mining extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT * FROM process_log")->result_array();
    }

    public function hapushistory($id)
    {
        $this->db->query("DELETE FROM process_log WHERE id='$id'");
    }

    public function getAllTransaksi()
    {
        $sql = "SELECT * FROM transaksi";
        return $this->db->query($sql)->result();
    }

    public function getHasil()
    {
        $sql = "SELECT * FROM process_log";
        return $this->db->query($sql)->result();
    }

    public function getTotalTransaksi()
    {
        $sql = "SELECT * FROM transaksi";
        return $this->db->query($sql)->num_row();
    }

    // gadipake di laporan
    public function tambahTransaksi()
    {
        $post = $this->input->post();
        $data = array(
            'id_transaksi' => $post["id_transaksi"],
            'transaction_date' => $post["tanggal_transaksi"],
            'total' => $post["total"],
            'produk' => $post["produk"]
        );
        $this->db->insert('transaksi', $data);
    }

    // gadipake di laporan
    public function updateTransaksi($id)
    {
        $post = $this->input->post();
        $this->db->set("id_transaksi", $post["id_transaksi"]);
        $this->db->set("transaction_date", $post["tanggal_transaksi"]);
        $this->db->set("total", $post["total"]);
        $this->db->set("produk", $post["produk"]);
        $this->db->where("id", $id);
        $this->db->update("transaksi");
    }

    // gadipake di laporan
    public function deleteTransaksi($id)
    {
        return $this->db->delete("transaksi", array("id" => $id));
    }

    public function deleteRule($id)
    {
        $this->db->delete("process_log", array("id" => $id));
        $this->db->delete("confidence", array("id_process" => $id));
        $this->db->delete("itemset1", array("id_process" => $id));
        $this->db->delete("itemset2", array("id_process" => $id));
        $this->db->delete("itemset3", array("id_process" => $id));

        return true;
    }

    private $_batchImport;

    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('transaksi', $data);
    }

    // Confidence ItemSet 3
    public function confidenceItemset3($id)
    {
        $id_process = $id;
        $_SESSION['eskrim'] = $id_process;
        $sql = "SELECT conf.*, log.start_date, log.end_date FROM confidence conf, process_log log
WHERE conf.id_process='$id_process'" . "AND conf.id_process=log.id " . "AND conf.from_itemset=3 ";
        return $this->db->query($sql)->result();
    }

    // Confidence ItemSet 2
    public function confidenceItemset2($id)
    {
        $id_process = $id;
        $sql = "SELECT conf.*, log.start_date, log.end_date FROM confidence conf, process_log log
WHERE conf.id_process='$id_process'" . "AND conf.id_process=log.id " . "AND conf.from_itemset=2 ";
        return $this->db->query($sql)->result();
    }

    // Get Rule Info
    public function getRuleID($id)
    {
        $sql = "SELECT * FROM process_log WHERE id = '$id'";
        return $this->db->query($sql)->row();
    }

    // Get Itemset 1
    public function getItemset1($id)
    {
        $sql = "SELECT * FROM itemset1 WHERE id_process = '$id' " . " ORDER BY lolos DESC";
        return $this->db->query($sql)->result();
    }

    // Get Itemset 2
    public function getItemset2($id)
    {
        $sql = "SELECT * FROM itemset2 WHERE id_process = '$id' " . " ORDER BY lolos DESC";
        return $this->db->query($sql)->result();
    }

    // Get Itemset 3
    public function getItemset3($id)
    {
        $sql = "SELECT * FROM itemset3 WHERE id_process = '$id' " . " ORDER BY lolos DESC";
        return $this->db->query($sql)->result();
    }

    public function getRentangTanggalTransaksi()
    {
        $post = $this->input->post();

        if (isset($_POST['range_tanggal'])) {
            $tgl = explode(" - ", $_POST['range_tanggal']);
            $start = format_date($tgl[0]);
            $end = format_date($tgl[1]);
            $sql = "SELECT * FROM transaksi WHERE transaction_date BETWEEN '$start' AND '$end'";
        }


        return $this->db->query($sql)->result();
    }

    public function getJumlahRentangTanggalTransaksi()
    {
        $post = $this->input->post();
        $tgl = explode(" - ", $_POST['range_tanggal']);
        $start = format_date($tgl[0]);
        $end = format_date($tgl[1]);

        $sql = "SELECT * FROM transaksi WHERE transaction_date BETWEEN '$start' AND '$end'";

        return $this->db->query($sql)->num_rows();
    }

    public function tambahProcessLog($min_support, $min_confidence, $start, $end)
    {
        $data = array(
            'start_date' => $start,
            'end_date' => $end,
            'min_support' => $min_support,
            'min_confidence' => $min_confidence
        );
        $this->db->insert('process_log', $data);
    }

    public function getLastIdProcessLog()
    {
        $sql = "SELECT max(Id) as last FROM process_log";
        $last = $this->db->query($sql)->row();
        return $last;
    }

    function get_variasi_itemset3($array_itemset3, $item1, $item2, $item3, $item4)
    {
        $return = array();

        $return1 = array();

        if (!in_array(strtoupper($item1), array_map('strtoupper', $return1))) {
            $return1[] = $item1;
        }

        if (!in_array(strtoupper($item2), array_map('strtoupper', $return1))) {
            $return1[] = $item2;
        }

        if (!in_array(strtoupper($item3), array_map('strtoupper', $return1))) {
            $return1[] = $item3;
        }

        $return2 = array();

        if (!in_array(strtoupper($item1), array_map('strtoupper', $return2))) {
            $return2[] = $item1;
        }

        if (!in_array(strtoupper($item2), array_map('strtoupper', $return2))) {
            $return2[] = $item2;
        }

        if (!in_array(strtoupper($item4), array_map('strtoupper', $return2))) {
            $return2[] = $item4;
        }

        $return3 = array();

        if (!in_array(strtoupper($item1), array_map('strtoupper', $return3))) {
            $return3[] = $item1;
        }

        if (!in_array(strtoupper($item3), array_map('strtoupper', $return3))) {
            $return3[] = $item3;
        }

        if (!in_array(strtoupper($item4), array_map('strtoupper', $return3))) {
            $return3[] = $item4;
        }

        $return4 = array();

        if (!in_array(strtoupper($item2), array_map('strtoupper', $return4))) {
            $return4[] = $item2;
        }

        if (!in_array(strtoupper($item3), array_map('strtoupper', $return4))) {
            $return4[] = $item3;
        }

        if (!in_array(strtoupper($item4), array_map('strtoupper', $return4))) {
            $return4[] = $item4;
        }

        if (count($return1) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return1)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return1)) {
                    $return[] = $return1;
                }
            }
        }

        if (count($return2) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return2)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return2)) {
                    $return[] = $return2;
                }
            }
        }

        if (count($return3) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return3)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return3)) {
                    $return[] = $return3;
                }
            }
        }

        if (count($return4) == 3) {
            if (!$this->is_exist_variasi_on_itemset3($return, $return4)) {
                if (!$this->is_exist_variasi_on_itemset3($array_itemset3, $return4)) {
                    $return[] = $return4;
                }
            }
        }

        return $return;
    }

    function is_exist_variasi_on_itemset3($array, $tiga_variasi)
    {
        $return = false;

        foreach ($array as $key => $value) {
            $jml = 0;
            foreach ($value as $key1 => $val1) {
                foreach ($tiga_variasi as $key2 => $val2) {
                    if (strtoupper($val1) == strtoupper($val2)) {
                        $jml++;
                    }
                }
            }
            if ($jml == 3) {
                $return = true;
                break;
            }
        }

        return $return;
    }

    function is_exist_variasi_itemset($array_item1, $array_item2, $item1, $item2)
    {
        //$return = true;

        //    $bool1 = array_search(strtoupper($item2), array_map('strtoupper', $array_item1));
        //    $bool2 = array_search(strtoupper($item1), array_map('strtoupper', $array_item2));
        //    $bool3 = array_search(strtoupper($item2), array_map('strtoupper', $array_item2));
        //    $bool4 = array_search(strtoupper($item1), array_map('strtoupper', $array_item1));
        $bool1 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item1));
        $bool2 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item2));
        $bool3 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item1));
        $bool4 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item2));

        foreach ($bool1 as $key => $value) {
            $aa = array_search($value, $bool2);

            if (is_numeric($aa)) {
                return true;
            }
        }

        foreach ($bool3 as $key => $value) {
            $aa = array_search($value, $bool4);

            if (is_numeric($aa)) {
                return true;
            }
        }

        //    if (is_numeric($bool1) && is_numeric($bool2) || is_numeric($bool3) && is_numeric($bool4)){
        //        if($bool1 === $bool2 || $bool3 === $bool4){
        //            return true;
        //        }
        //    }

        //    if (($bool3) && ($bool4)){
        //        if($bool3 == $bool4){//jika ditemukan dengan idex yg sama
        //            return true;
        //        }
        //    }

        return false;
    }

    function jumlah_itemset1($transaksi_list, $produk)
    {
        $count = 0;

        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_cocok = "," . strtoupper($produk) . ",";
            $pos = strpos($items, $item_cocok);

            if ($pos !== false) {
                //was found at position $pos
                $count++;
            }
        }

        return $count;
    }

    function jumlah_itemset2($transaksi_list, $variasi1, $variasi2)
    {
        $count = 0;

        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_variasi1 = "," . strtoupper($variasi1) . ",";
            $item_variasi2 = "," . strtoupper($variasi2) . ",";

            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);

            if ($pos1 !== false && $pos2 !== false) {
                //was found at position $pos
                $count++;
            }
        }

        return $count;
    }

    function jumlah_itemset3($transaksi_list, $variasi1, $variasi2, $variasi3)
    {
        $count = 0;

        foreach ($transaksi_list as $key => $data) {
            $items = "," . strtoupper($data['produk']);
            $item_variasi1 = "," . strtoupper($variasi1) . ",";
            $item_variasi2 = "," . strtoupper($variasi2) . ",";
            $item_variasi3 = "," . strtoupper($variasi3) . ",";

            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);
            $pos3 = strpos($items, $item_variasi3);

            if ($pos1 !== false && $pos2 !== false && $pos3 !== false) {
                //was found at position $pos
                $count++;
            }
        }

        return $count;
    }

    /**
     * kombinasi atibut1 U atribut2 => $atribut3
     * save to table confidence
     * @param type $supp_xuy
     * @param type $atribut1
     * @param type $atribut2
     * @param type $atribut3
     */

    function hitung_confidence($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $atribut3, $id_process, $dataTransaksi, $jumlah_transaksi, $j1, $j2, $j3, $j4)
    {

        //hitung nilai support $nilai_support_x seperti di itemset2
        $jml_itemset2 = $j1;
        $nilai_support_x = ($jml_itemset2 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1 . " , " . $atribut2;
        $kombinasi2 = $atribut3;
        $supp_x = $nilai_support_x; //$row1_['support'];

        if ($supp_x == 0)
            $conf = 0;
        else
            $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $j2;
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $j3;
        $jumlah_kemunculanB = $j4;
        if ($jumlah_kemunculanA == 0 || $jumlah_kemunculanB == 0)
            $nilai_uji_lift = 0;
        else
            //$nilai_uji_lift = $PAUB / $jumlah_kemunculanA * $jumlah_kemunculanB;
            $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";

        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }

        //masukkan ke table confidence
        $data = array(
            "kombinasi1" => $kombinasi1,
            "kombinasi2" => $kombinasi2,
            "support_xUy" => $supp_xuy,
            "support_x" => $supp_x,
            "confidence" => $conf,
            "lolos" => $lolos,
            "min_support" => $min_support,
            "min_confidence" => $min_confidence,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "id_process" => $id_process,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
            "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset" => 3
        );
        $this->db->insert('confidence', $data);
    }

    /**
     * confidence atribut1 => atribut2 U atribut3
     * @param type $supp_xuy
     * @param type $min_support
     * @param type $min_confidence
     * @param type $atribut1
     * @param type $atribut2
     * @param type $atribut3
     */
    function hitung_confidence1($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $atribut3, $id_process, $dataTransaksi, $jumlah_transaksi, $j1, $j2, $j3, $j4)
    {

        //hitung nilai support seperti itemset1
        $jml_itemset1 = $j1;
        $nilai_support_x = ($jml_itemset1 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2 . " , " . $atribut3;
        $supp_x = $nilai_support_x; //$row4_['support'];
        if ($supp_x == 0)
            $conf = 0;
        else
            $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $j2;
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $j3;
        $jumlah_kemunculanB = $j4;

        if ($jumlah_kemunculanA == 0 || $jumlah_kemunculanB == 0)
            $nilai_uji_lift = 0;
        else
            $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";

        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }


        //masukkan ke table confidence
        $data = array(
            "kombinasi1" => $kombinasi1,
            "kombinasi2" => $kombinasi2,
            "support_xUy" => $supp_xuy,
            "support_x" => $supp_x,
            "confidence" => $conf,
            "lolos" => $lolos,
            "min_support" => $min_support,
            "min_confidence" => $min_confidence,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "id_process" => $id_process,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
            "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset" => 3
        );
        $this->db->insert('confidence', $data);
    }

    // gamasuk laporan
    function hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $id_process, $dataTransaksi, $jumlah_transaksi, $j1, $j2, $j3, $j4)
    {
        //hitung nilai support seperti itemset1
        $jml_itemset1 = $j1;
        $nilai_support_x = ($jml_itemset1 / $jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2;
        $supp_x = $nilai_support_x; //$row1_['support'];
        if ($supp_x == 0)
            $conf = 0;
        else
            $conf = ($supp_xuy / $supp_x) * 100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence) ? 1 : 0;

        //hitung korelasi lift
        $jumlah_kemunculanAB = $j2;
        $PAUB = $jumlah_kemunculanAB / $jumlah_transaksi;

        $jumlah_kemunculanA = $j3;
        $jumlah_kemunculanB = $j4;

        if ($jumlah_kemunculanA == 0 || $jumlah_kemunculanB == 0)
            $nilai_uji_lift = 0;
        else
            $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA / $jumlah_transaksi) * ($jumlah_kemunculanB / $jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift < 1) ? "korelasi negatif" : "korelasi positif";

        if ($nilai_uji_lift == 1) {
            $korelasi_rule = "tidak ada korelasi";
        }

        //masukkan ke table confidence
        $data = array(
            "kombinasi1" => $kombinasi1,
            "kombinasi2" => $kombinasi2,
            "support_xUy" => $supp_xuy,
            "support_x" => $supp_x,
            "confidence" => $conf,
            "lolos" => $lolos,
            "min_support" => $min_support,
            "min_confidence" => $min_confidence,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "id_process" => $id_process,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA / $jumlah_transaksi),
            "py" => ($jumlah_kemunculanB / $jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset" => 2
        );
        $this->db->insert('confidence', $data);
    }

    public function miningProcess($min_support, $min_confidence, $start, $end)
    {
        $datasetitem = array(); //array indeks angka
        $iddataset = array(); // array indeks string
        $jumdataset1 = array(); //array indeks string
        $jumdataset2 = array(); //array indeks string
        $idxdataset2 = array(); //index data set 2
        $jumdataset3 = array(); //array indeks string
        $menarique = array(); //untuk combinasi setiap baris transaksi

        $sql_trans = "SELECT * FROM transaksi WHERE transaction_date BETWEEN '$start' AND '$end'";
        $result_trans = $this->db->query($sql_trans)->result();
        $result_trans2 = $this->db->query($sql_trans)->result_array();
        $result_trans3 = $this->db->query($sql_trans)->row();

        $jumlah_transaksi1 = $this->db->query($sql_trans)->num_rows();
        $jumlah_transaksi = count($result_trans);
        $jumlah_transaksi2 = count($result_trans2);

        $this->tambahProcessLog($min_support, $min_confidence, $start, $end);


        // var_dump($result_trans);
        // var_dump($jumlah_transaksi1);

        // die();

        $dataTransaksi = $myrow = $item_list = array();
        // $jumlah_transaksi=num_rows($jumlah_trans);

        //$min_support_relative = ($min_support / $jumlah_transaksi) * 100;
        $min_support_relative = $min_support;
        $x = 0;
        $radja = 0;
        $Lord = 0;
        $wkwk = 1;
        // while($myrow=$this->db->query($sql_trans)->result_array()) {
        // pembuatan pemecahan item-item pada barangwkwkw kompleksitas banyaknya id log //
        foreach ($result_trans2 as $myrow) {

            $dataTransaksi[$x]['tanggal'] = $myrow['transaction_date'];
            $item_produk = $myrow['produk'] . ",";
            //mencegah ada jarak spasi
            $item_produk = str_replace(" ,", ",", $item_produk);
            $item_produk = str_replace("  ,", ",", $item_produk);
            $item_produk = str_replace("   ,", ",", $item_produk);
            $item_produk = str_replace("    ,", ",", $item_produk);
            $item_produk = str_replace(", ", ",", $item_produk);
            $item_produk = str_replace(",  ", ",", $item_produk);
            $item_produk = str_replace(",   ", ",", $item_produk);
            $item_produk = str_replace(",    ", ",", $item_produk);

            $dataTransaksi[$x]['produk'] = $item_produk;
            $produk = explode(",", $myrow['produk']);

            $rakyat = $radja;
            $sultan = 0;

            //all items
            foreach ($produk as $key => $value_produk) {
                //if(!in_array($value_produk, $item_list)){
                if (!in_array(strtoupper($value_produk), array_map('strtoupper', $item_list))) {
                    if (!empty($value_produk)) {
                        $item_list[] = $value_produk;
                    }
                }



                $menarique[$sultan] = $value_produk;
                $sultan++;

                if (!isset($datasetitem[$value_produk])) {
                    $datasetitem[$radja] = $value_produk;
                    $radja++;
                }

                if (!isset($jumdataset1[$value_produk]))
                    $jumdataset1[$value_produk] = 1;
                else $jumdataset1[$value_produk]++;
            }
            for ($m = 0; $m <= $sultan - 2; $m++)
                for ($n = $m + 1; $n <= $sultan - 1; $n++) {

                    if (!isset($jumdataset2[$menarique[$m]][$menarique[$n]]) || !isset($jumdataset2[$menarique[$n]][$menarique[$m]])) {
                        $jumdataset2[$menarique[$m]][$menarique[$n]] = 1;
                        $jumdataset2[$menarique[$n]][$menarique[$m]] = 1;
                        $idxdataset2[$Lord][0] = $menarique[$m];
                        $idxdataset2[$Lord][1] = $menarique[$n];
                        $Lord++;
                    } else {
                        $jumdataset2[$menarique[$m]][$menarique[$n]]++;
                        $jumdataset2[$menarique[$n]][$menarique[$m]]++;
                    }
                }

            for ($m = 0; $m <= $sultan - 3; $m++)
                for ($n = $m + 1; $n <= $sultan - 2; $n++)
                    for ($o = $n + 1; $o <= $sultan - 1; $o++) {
                        if (!isset($jumdataset3[$menarique[$m]][$menarique[$n]][$menarique[$o]]) || !isset($jumdataset3[$menarique[$m]][$menarique[$o]][$menarique[$n]]) || !isset($jumdataset3[$menarique[$n]][$menarique[$m]][$menarique[$o]]) || !isset($jumdataset3[$menarique[$n]][$menarique[$o]][$menarique[$m]]) || !isset($jumdataset3[$menarique[$o]][$menarique[$n]][$menarique[$m]]) || !isset($jumdataset3[$menarique[$o]][$menarique[$m]][$menarique[$n]])) {

                            $jumdataset3[$menarique[$m]][$menarique[$n]][$menarique[$o]] = 1;
                            $jumdataset3[$menarique[$m]][$menarique[$o]][$menarique[$n]] = 1;
                            $jumdataset3[$menarique[$n]][$menarique[$m]][$menarique[$o]] = 1;
                            $jumdataset3[$menarique[$n]][$menarique[$o]][$menarique[$m]] = 1;
                            $jumdataset3[$menarique[$o]][$menarique[$m]][$menarique[$n]] = 1;
                            $jumdataset3[$menarique[$o]][$menarique[$n]][$menarique[$m]] = 1;
                        } else {
                            $jumdataset3[$menarique[$m]][$menarique[$n]][$menarique[$o]]++;
                            $jumdataset3[$menarique[$m]][$menarique[$o]][$menarique[$n]]++;
                            $jumdataset3[$menarique[$n]][$menarique[$m]][$menarique[$o]]++;
                            $jumdataset3[$menarique[$n]][$menarique[$o]][$menarique[$m]]++;
                            $jumdataset3[$menarique[$o]][$menarique[$m]][$menarique[$n]]++;
                            $jumdataset3[$menarique[$o]][$menarique[$n]][$menarique[$m]]++;
                        }
                    }
        }
        $radja--;
        $Lord--;
        $id_Yuhuu = $this->getLastIdProcessLog(); // banyaknya proses log
        $id_process = $id_Yuhuu->last;


        //build itemset 1
        $itemset1 = $jumlahItemset1 = $supportItemset1 = $valueIn = array();
        $x = 1;
        // kompleksitas nya banyaknya jumlah item 
        foreach ($item_list as $key => $item) {


            $pull = $jumdataset1[$item];
            $support = ($pull / $jumlah_transaksi) * 100;

            // var_dump($item); 

            // var_dump($jumlah);
            // var_dump($jumlah_transaksi);

            // var_dump($support);
            // var_dump($min_support_relative);
            // die();

            if ($support >= $min_support_relative) {
                $lolos = 1;
            } else {
                $lolos = 0;
            }
            // $lolos=($support>=$min_support_relative)?1: 0;
            $valueIn[] = "('$item','$pull','$support','$lolos','$id_process')";

            if ($lolos == 1) {
                $itemset1[] = $item; //item yg lolos itemset1
                $jumlahItemset1[] = $pull;
                $supportItemset1[] = $support;
            }

            $x++;
        }


        //insert into itemset1 one query with many value
        if ($valueIn) {
            $value_insert = implode(",", $valueIn);
            $sql_insert_itemset1 = "INSERT INTO itemset1 (atribut, jumlah, support, lolos, id_process) VALUES " . $value_insert;
            $this->db->query($sql_insert_itemset1);
        }

        //build itemset2
        $NilaiAtribut1 = $NilaiAtribut2 = array();
        $itemset2_var1 = $itemset2_var2 = $jumlahItemset2 = $supportItemset2 = array();
        $valueIn_itemset2 = array();
        $no = 1;


        $a = 0;
        while ($a < count($itemset1) - 1) {
            $b = $a + 1;

            while ($b < count($itemset1)) {
                $variance1 = $itemset1[$a];
                $variance2 = $itemset1[$b];
                if (isset($jumdataset2[$variance1][$variance2])) {

                    $pull = $jumdataset2[$variance1][$variance2];
                    $support2 = ($pull / $jumlah_transaksi) * 100;
                    $lolos = ($support2 >= $min_support_relative) ? 1 : 0;

                    $valueIn_itemset2[] = "('$variance1','$variance2','$pull','$support2','$lolos','$id_process')";

                    if ($lolos) {
                        $itemset2_var1[] = $variance1;
                        $itemset2_var2[] = $variance2;
                        $jumlahItemset2[] = $pull;
                        $supportItemset2[] = $support2;
                    }

                    $no++;
                }

                $b++;
            }

            $a++;
        }




        //insert into itemset2 one query with many value

        if ($valueIn_itemset2) {
            $value_insert_itemset2 = implode(",", $valueIn_itemset2);

            $sql_insert_itemset2 = "INSERT INTO itemset2 (atribut1, atribut2, jumlah, support, lolos, id_process) VALUES " . $value_insert_itemset2;
            $this->db->query($sql_insert_itemset2);
        }
        // var_dump($valueIn);
        // die();


        //build itemset3
        $a = 0;
        $tigaVariasiItem = $valueIn_itemset3 = array();
        $itemset3_var1 = $itemset3_var2 = $itemset3_var3 = $jumlahItemset3 = $supportItemset3 = array();
        $no = 1;

        while ($a < count($itemset2_var1) - 1) {
            $b = $a + 1;

            while ($b < count($itemset2_var1)) {
                $itemset1a = $itemset2_var1[$a];
                $itemset1b = $itemset2_var2[$a];

                $itemset2a = $itemset2_var1[$b];
                $itemset2b = $itemset2_var2[$b];
                if ($itemset1a == $itemset2a) {

                    if (!empty($itemset1a) && !empty($itemset1b) && !empty($itemset2a) && !empty($itemset2b)) {



                        //jumlah item set3 dan menghitung supportnya
                        //$jml_itemset3 = get_count_itemset3($db_object, $itemset1, $itemset2, $itemset3, $start_date, $end_date);
                        if (isset($jumdataset3[$itemset1a][$itemset1b][$itemset2b])) {
                            $pull = $jumdataset3[$itemset1a][$itemset1b][$itemset2b];
                            $support3 = ($pull / $jumlah_transaksi) * 100;
                            $lolos = ($support3 >= $min_support_relative) ? 1 : 0;

                            $valueIn_itemset3[] = "('$itemset1a','$itemset1b','$itemset2b','$pull','$support3','$lolos','$id_process')";

                            if ($lolos) {
                                $itemset3_var1[] = $itemset1a;
                                $itemset3_var2[] = $itemset1b;
                                $itemset3_var3[] = $itemset2b;
                                $jumlahItemset3[] = $pull;
                                $supportItemset3[] = $support3;
                            }
                        }
                    }
                }

                $b++;
            }
            $a++;
        }

        //insert into itemset3 one query with many value
        if ($valueIn_itemset3) {
            $value_insert_itemset3 = implode(",", $valueIn_itemset3);
            $sql_insert_itemset3 = "INSERT INTO itemset3(atribut1, atribut2, atribut3, jumlah, support, lolos, id_process) VALUES " . $value_insert_itemset3;
            $this->db->query($sql_insert_itemset3);
        }

        //hitung confidence
        $confidence_from_itemset = 0;
        //dari itemset 3 jika tidak ada yg lolos ambil dari itemset 2 jika tiak ada gagal mendapatkan confidence
        $sql_3 = "SELECT * FROM itemset3 WHERE lolos = 1 AND id_process = " . $id_process;
        $res_3 = $this->db->query($sql_3)->result_array();
        $jumlah_itemset3_lolos = $this->db->query($sql_3)->num_rows();

        if ($jumlah_itemset3_lolos > 0) {
            $confidence_from_itemset = 3;

            // while($row_3=$this->db->mysqli_fetch_array($res_3)) {
            foreach ($res_3 as $row_3) {


                $atribut1 = $row_3['atribut1'];
                $atribut2 = $row_3['atribut2'];
                $atribut3 = $row_3['atribut3'];
                $supp_xuy = $row_3['support'];

                if (isset($jumdataset1[$atribut1]))
                    $j11 = $jumdataset1[$atribut1];
                else $j11 = 0;

                if (isset($jumdataset3[$atribut1][$atribut3][$atribut2]))
                    $j12 = $jumdataset3[$atribut1][$atribut3][$atribut2];
                else $j12 = 0;

                if (isset($jumdataset1[$atribut1]))
                    $j13 = $jumdataset1[$atribut1];
                else $j13 = 0;

                if (isset($jumdataset2[$atribut3][$atribut2]))
                    $j14 = $jumdataset2[$atribut3][$atribut2];
                else $j14 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j21 = $jumdataset1[$atribut2];
                else $j21 = 0;

                if (isset($jumdataset3[$atribut2][$atribut1][$atribut3]))
                    $j22 = $jumdataset3[$atribut2][$atribut1][$atribut3];
                else $j22 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j23 = $jumdataset1[$atribut2];
                else $j23 = 0;

                if (isset($jumdataset2[$atribut1][$atribut3]))
                    $j24 = $jumdataset2[$atribut1][$atribut3];
                else $j24 = 0;

                if (isset($jumdataset1[$atribut3]))
                    $j31 = $jumdataset1[$atribut3];
                else $j31 = 0;

                if (isset($jumdataset3[$atribut3][$atribut2][$atribut1]))
                    $j32 = $jumdataset3[$atribut3][$atribut2][$atribut1];
                else $j32 = 0;

                if (isset($jumdataset1[$atribut3]))
                    $j33 = $jumdataset1[$atribut3];
                else $j33 = 0;

                if (isset($jumdataset2[$atribut2][$atribut1]))
                    $j34 = $jumdataset2[$atribut2][$atribut1];
                else $j34 = 0;

                //1 => 3,2
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut1,
                    $atribut3,
                    $atribut2,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j11,
                    $j12,
                    $j13,
                    $j14
                );

                //2 => 1,3
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut2,
                    $atribut1,
                    $atribut3,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j21,
                    $j22,
                    $j23,
                    $j24
                );

                //3 => 2,1
                $this->hitung_confidence1(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut3,
                    $atribut2,
                    $atribut1,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j31,
                    $j32,
                    $j33,
                    $j34
                );

                if (isset($jumdataset2[$atribut1][$atribut2]))
                    $j11 = $jumdataset2[$atribut1][$atribut2];
                else $j11 = 0;

                if (isset($jumdataset3[$atribut1][$atribut2][$atribut3]))
                    $j12 = $jumdataset3[$atribut1][$atribut2][$atribut3];
                else $j12 = 0;

                if (isset($jumdataset2[$atribut1][$atribut2]))
                    $j13 = $jumdataset2[$atribut1][$atribut2];
                else $j13 = 0;

                if (isset($jumdataset1[$atribut3]))
                    $j14 = $jumdataset1[$atribut3];
                else $j14 = 0;

                if (isset($jumdataset2[$atribut2][$atribut3]))
                    $j21 = $jumdataset2[$atribut2][$atribut3];
                else $j21 = 0;

                if (isset($jumdataset3[$atribut2][$atribut3][$atribut1]))
                    $j22 = $jumdataset3[$atribut2][$atribut3][$atribut1];
                else $j22 = 0;

                if (isset($jumdataset2[$atribut2][$atribut3]))
                    $j23 = $jumdataset2[$atribut2][$atribut3];
                else $j23 = 0;

                if (isset($jumdataset1[$atribut1]))
                    $j24 = $jumdataset1[$atribut1];
                else $j24 = 0;

                if (isset($jumdataset2[$atribut3][$atribut1]))
                    $j31 = $jumdataset2[$atribut3][$atribut1];
                else $j31 = 0;

                if (isset($jumdataset3[$atribut3][$atribut1][$atribut2]))
                    $j32 = $jumdataset3[$atribut3][$atribut1][$atribut2];
                else $j32 = 0;

                if (isset($jumdataset2[$atribut3][$atribut1]))
                    $j33 = $jumdataset2[$atribut3][$atribut1];
                else $j33 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j34 = $jumdataset1[$atribut2];
                else $j34 = 0;

                //1,2 => 3
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut1,
                    $atribut2,
                    $atribut3,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j11,
                    $j12,
                    $j13,
                    $j14
                );

                //2,3 => 1
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut2,
                    $atribut3,
                    $atribut1,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j21,
                    $j22,
                    $j23,
                    $j24
                );

                //3,1 => 2
                $this->hitung_confidence(
                    $supp_xuy,
                    $min_support,
                    $min_confidence,
                    $atribut3,
                    $atribut1,
                    $atribut2,
                    $id_process,
                    $dataTransaksi,
                    $jumlah_transaksi,
                    $j31,
                    $j32,
                    $j33,
                    $j34
                );
            }
        }

        //dari itemset 2
        $sql_2 = "SELECT * FROM itemset2 WHERE lolos = 1 AND id_process = " . $id_process;
        $res_2 = $this->db->query($sql_2)->result_array();
        $jumlah_itemset2_lolos = $this->db->query($sql_2)->num_rows();

        if ($jumlah_itemset2_lolos > 0) {
            $confidence_from_itemset = 2;

            //while($row_2=$this->db->mysqli_fetch_array($res_2)) {
            foreach ($res_2 as $row_2) {

                $atribut1 = $row_2['atribut1'];
                $atribut2 = $row_2['atribut2'];
                $supp_xuy = $row_2['support'];

                if (isset($jumdataset1[$atribut1]))
                    $j11 = $jumdataset1[$atribut1];
                else $j11 = 0;

                if (isset($jumdataset2[$atribut1][$atribut2]))
                    $j12 = $jumdataset2[$atribut1][$atribut2];
                else $j12 = 0;

                if (isset($jumdataset1[$atribut1]))
                    $j13 = $jumdataset1[$atribut1];
                else $j13 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j14 = $jumdataset1[$atribut2];
                else $j14 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j21 = $jumdataset1[$atribut2];
                else $j21 = 0;

                if (isset($jumdataset2[$atribut2][$atribut1]))
                    $j22 = $jumdataset2[$atribut2][$atribut1];
                else $j22 = 0;

                if (isset($jumdataset1[$atribut2]))
                    $j23 = $jumdataset1[$atribut2];
                else $j23 = 0;

                if (isset($jumdataset1[$atribut1]))
                    $j24 = $jumdataset1[$atribut1];
                else $j24 = 0;

                //1 => 2
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $id_process, $dataTransaksi, $jumlah_transaksi, $j11, $j12, $j13, $j14);

                //2 => 1
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut2, $atribut1, $id_process, $dataTransaksi, $jumlah_transaksi, $j21, $j22, $j23, $j24);
            }
        }

        // var_dump($confidence_from_itemset);
        // die();

        if ($confidence_from_itemset == 0) {
            return false;
        } else {
            return true;
        }
    }
}
