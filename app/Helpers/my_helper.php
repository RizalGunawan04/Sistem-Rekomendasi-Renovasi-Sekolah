<?php
function get_penilaian()
{
    $rows = get_results("SELECT * FROM tb_penilaian ORDER BY kode_sekolah, kode_kriteria");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_sekolah][$row->kode_kriteria] = $row->nilai;
    }
    return $arr;
}


function load_view($name, $data = [], $options = [])
{
    echo view('app/header.php', $data, $options);
    echo view($name, $data, $options);
    echo view('app/footer.php', $data, $options);
}

function load_view_cetak($name, $data = [], $options = [])
{
    echo view('app/header_cetak.php', $data, $options);
    echo view($name, $data, $options);
    echo view('app/footer_cetak.php', $data, $options);
}

function print_error()
{
    $error = session()->getFlashdata('error');
    if ($error) {
        echo '<div class="alert alert-danger" alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $error . '</div>';
    }
}

function show_msg()
{
    $msg = session()->get('msg');
    if ($msg)
        echo '<div class="alert alert-' . $msg[0] . '" alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg[1] . '</div>';
}

function kode_oto($field, $table, $prefix, $length)
{
    $row = get_row("SELECT $field AS kode FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");

    if ($row) {
        return $prefix . substr(str_repeat('0', $length) . (substr($row->kode, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_row($sql)
{
    $query = query($sql);
    return $query->getRow();
}

function get_results($sql)
{
    $query = query($sql);
    return $query->getResult();
}

function get_var($sql)
{
    $query = query($sql);
    $row = $query->getRowArray();
    if ($row)
        return current($row);
}

function query($sql)
{
    $db = db_connect();
    return $db->query($sql);
}

function get_kriteria()
{
    $rows = get_results("SELECT * FROM tb_kriteria");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_kriteria] = $row;
    }
    return $arr;
}

function get_sekolah()
{
    $rows = get_results("SELECT * FROM tb_sekolah");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_sekolah] = $row;
    }
    return $arr;
}

function get_kriteria_option($selected = null)
{
    $kriteria = get_kriteria();
    $a = '';
    foreach ($kriteria as $key => $val) {
        if ($key == $selected) {
            echo "<option value='$key' selected>$val->nama_kriteria</option>";
        } else {
            echo "<option value='$key'>$val->nama_kriteria</option>";
        }
    }
}

function get_level_option($selected = null)
{
    $arr = array(
        'admin' => 'Admin',
        'user' => 'User',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected) {
            echo "<option value='$key' selected>$val</option>";
        } else {
            echo "<option value='$key'>$val</option>";
        }
    }
}
function get_file_link($path, $filename)
{
    $file = $path . $filename;
    if (is_file($file))
        return '<a href="' . base_url($file) . '" target="_blank">' . $filename . '</a>';
    else
        return 'No file';
}

class MAUT
{
    public $penilaian;
    public $bobot;

    function __construct($penilaian, $bobot)
    {
        $this->penilaian = $penilaian;
        $this->bobot = $bobot;
        $this->bobot_normal();
        $this->normal();
        $this->terbobot();
        $this->total();
        $this->rank();
    }

    function rank()
    {
        $temp = $this->total;
        arsort($temp);
        $no = 1;
        $this->rank = [];
        foreach ($temp as $key => $value) {
            $this->rank[$key] = $no++;
        }
    }

    function total()
    {
        $this->total = [];
        foreach ($this->terbobot as $key => $val) {
            $this->total[$key] = array_sum($val);
        }
    }

    function terbobot()
    {
        $this->terbobot = [];
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $this->terbobot[$key][$k] = $v * $this->bobot_normal[$k];
            }
        }
    }

    function normal()
    {
        $arr = [];
        foreach ($this->penilaian as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        foreach ($arr as $key => $val) {
            $this->minmax[$key]['min'] = min($val);
            $this->minmax[$key]['max'] = max($val);
        }
        $this->normal = [];
        foreach ($this->penilaian as $key => $val) {
            foreach ($val as $k => $v) {
                $min = $this->minmax[$k]['min'];
                $max = $this->minmax[$k]['max'];
                $this->normal[$key][$k] = $max == $min ? 0 : ($v - $min) / ($max - $min);
            }
        }
    }

    function bobot_normal()
    {
        $total = array_sum($this->bobot);
        $this->bobot_normal = [];
        foreach ($this->bobot as $key => $val) {
            $this->bobot_normal[$key] = $val / $total;
        }
    }
}

function get_tingkat_kerusakan($penilaian_total)
{
    if ($penilaian_total <= 30)
        return 'Rusak Ringan';
    elseif ($penilaian_total <= 45)
        return 'Rusak Sedang';
    else
        return 'Rusak Berat';
}
function get_ket_hasil($tingkat_kerusakan)
{
    if ($tingkat_kerusakan == 'Rusak Ringan')
        return 'Tidak Dibiayai DAK';
    else
        return 'Dibiayai DAK';
}
