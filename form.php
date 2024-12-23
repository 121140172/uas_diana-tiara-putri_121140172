<h1>Catatan Bersama</h1>
<form id="sharedNoteForm" method="post">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input
            value="<?php echo isset($_SESSION['old']['nama']) ? $_SESSION['old']['nama'] : ''; ?>"
            type="text" id="nama" name="nama" placeholder="Masukkan Nama">
        <div class="error" id="namaError"></div>
    </div>

    <div class="form-group">
        <label for="content">Isi Catatan</label>
        <textarea id="content" name="isi" rows="4" placeholder="Masukkan isi catatan"><?= isset($_SESSION['old']['isi']) ? $_SESSION['old']['isi'] : '' ?></textarea>
        <div class="error" id="contentError"></div>
    </div>

    <div class="form-group">
        <label for="priority">Prioritas</label>
        <select id="priority" name="priority">
            <option value="tinggi"
                <?php echo isset($_SESSION['old']['priority'])
                    && $_SESSION['old']['priority'] === 'tinggi' ? 'selected' : ''; ?>>Tinggi
            </option>
            <option value="sedang"
                <?php echo isset($_SESSION['old']['priority'])
                    && $_SESSION['old']['priority'] === 'sedang' ? 'selected' : ''; ?>>Sedang
            </option>
            <option
                <?php echo isset($_SESSION['old']['priority'])
                    && $_SESSION['old']['priority'] === 'rendah' ? 'selected' : ''; ?>
                value="rendah">Rendah</option>
        </select>
        <div class="error" id="priorityError"></div>
    </div>

    <div class="form-group">
        <label>Tag</label>
        <label><input type="checkbox" id="tag1" name="tags[]"
                <?php echo isset($_SESSION['old']['tags']) && in_array('Pribadi', $_SESSION['old']['tags']) ? 'checked' : ''; ?>
                value="Pribadi"> Pribadi</label>
        <label><input type="checkbox" id="tag2" name="tags[]"
                <?php echo isset($_SESSION['old']['tags']) && in_array('Uang', $_SESSION['old']['tags']) ? 'checked' : ''; ?>
                value="Uang"> Uang</label>
        <label><input type="checkbox" id="tag3" name="tags[]"
                <?php echo isset($_SESSION['old']['tags']) && in_array('Barang', $_SESSION['old']['tags']) ? 'checked' : ''; ?>
                value="Barang"> Barang</label>
        <label><input type="checkbox" id="tag4" name="tags[]"
                <?php echo isset($_SESSION['old']['tags']) && in_array('Belajar', $_SESSION['old']['tags']) ? 'checked' : ''; ?>
                value="Belajar"> Belajar</label>
    </div>

    <button type="submit" disabled class="submit-btn">Simpan Catatan</button>
</form>
<script>
    const form = document.getElementById('sharedNoteForm');
    const nama = document.getElementById('nama');
    const content = document.getElementById('content');
    const priority = document.getElementById('priority');
    const tags = document.querySelectorAll('input[name="tags"]');

    const namaError = document.getElementById('namaError');
    const contentError = document.getElementById('contentError');
    const priorityError = document.getElementById('priorityError');

    const err = {
        nama: true,
        content: true
    }

    const disableSubmit = (toggle = true) => {
        if (err.nama || err.content) {
            toggle = true;
        }
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.disabled = toggle;
    }

    nama.addEventListener('keyup', () => {
        if (nama.value.length < 3) {
            namaError.style.display = 'block';
            namaError.innerText = 'Nama setidaknya 3 karakter';
        } else {
            namaError.style.display = 'none';
            namaError.innerText = '';
            err.nama = false;
            disableSubmit(false);
        }
        setNamaLocalStorage(nama.value);
    });
    content.addEventListener('keyup', () => {
        if (content.value.length < 10) {
            contentError.style.display = 'block';
            contentError.innerText = 'Isi catatan setidaknya 10 karakter';

        } else {
            contentError.style.display = 'none';
            contentError.innerText = '';
            err.content = false;
            disableSubmit(false);
        }
    });
    priority.addEventListener('change', () => {
        if (priority.value === '') {
            priorityError.style.display = 'block';
            priorityError.innerText = 'Prioritas harus dipilih';
        } else {
            priorityError.style.display = 'none';
            priorityError.innerText = '';

            disableSubmit(false);
        }
    });

    getNamaLocalStorage = () => {
        return localStorage.getItem('nama');
    }
    setNamaLocalStorage = (nama) => {
        localStorage.setItem('nama', nama);
    }
    if (getNamaLocalStorage()) {
        nama.value = getNamaLocalStorage();
    }

    window.addEventListener('load', () => {
        if (nama.value.length < 3) {
            if (nama.value != '') {
                namaError.style.display = 'block';
                namaError.innerText = 'Nama setidaknya 3 karakter';
                err.nama = true;
            }
        } else {
            namaError.style.display = 'none';
            namaError.innerText = '';
            err.nama = false;
        }

        if (content.value.length < 10) {
            if (content.value != '') {
                contentError.style.display = 'block';
                contentError.innerText = 'Isi catatan setidaknya 10 karakter';
                err.content = true;
            }
        } else {
            contentError.style.display = 'none';
            contentError.innerText = '';
            err.content = false;
        }
    });
</script>