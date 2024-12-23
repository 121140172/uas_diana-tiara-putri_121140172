<table id="notesTable">
    <thead>
        <tr>
            <th>Judul</th>
            <th style="max-width:50%">Isi</th>
            <th>Prioritas</th>
            <th>Tag</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $note): ?>
            <tr>
                <td><?php echo $note['nama']; ?></td>
                <td><?php echo $note['isi']; ?></td>
                <td><?php echo $note['priority']; ?></td>
                <td><?php echo $note['tag']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>