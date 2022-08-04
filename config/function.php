<?php
function session_timeout(){
    //lama waktu 30 menit = 1800
    if(isset($_SESSION['LAST_ACTIVITY'])&&(time()-$_SESSION['LAST_ACTIVITY']>1800)){
        session_unset();
        session_destroy();
        header("Location:".$base_url."login.php");
    }$_SESSION['LAST_ACTIVITY']=time();
}
function delMask( $str ) {
    return (int)implode('',explode('.',$str));
}
function hakAkses( array $a){
    $akses = $_SESSION['level'];
    if(!in_array($akses,$a)){
        // header('Location:?');
        echo '<script>window.location = "?#";</script>';
    }
}
function bulan($bln){
    $bulan = [
        1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

    return $bulan[$bln];
}
function tahun(){
    return [
        '2020','2021','2022','2023','2024','2025'
    ];
}

function list_unit_kerja(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM unit_kerja ORDER BY nama_unit_kerja ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['id_unitkerja']."\">".$row['nama_unit_kerja']."</option>";
    }  
    return $opt; 
}

function list_supplier(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM supplier ORDER BY nama_supplier ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['idsupplier']."\">".$row['nama_supplier']."</option>";
    }  
    return $opt; 
}

function list_barang(){
    include ('conn.php');
    $supplier = mysqli_query($con,"SELECT * FROM supplier ORDER BY nama_supplier ASC");
    $opt = "";
    while($row = mysqli_fetch_array($supplier)){
        $barang = mysqli_query($con,"SELECT x.*,x1.nama_unit_kerja FROM barang x JOIN unit_kerja x1 ON x1.id_unitkerja=x.unitkerja_id WHERE supplier_id='".$row['idsupplier']."' ORDER BY nama_barang ASC");
        $opt .= "<optgroup label=\"".$row['nama_supplier']." | ".$row['keterangan']."\">";
        while($row2 = mysqli_fetch_array($barang)){
            $opt .= "<option value=\"".$row2['idbarang']."\">".$row2['nama_barang']." - ".$row2['nama_unit_kerja']."</option>";
        }
        $opt .= "</optgroup>";
    }  
    return $opt; 
}

function encrypt($str) {
return base64_encode($str);
}
function decrypt($str) {
return base64_decode($str);
}

function base_url(){
    $base_url= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url.= "://".$_SERVER['HTTP_HOST'];
    $base_url.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    return $base_url;
}
?>