<?php

namespace App\Constants;

/**
 * Provide alert message content.
 */

class Messages
{
    const SAVED = 'Data telah disimpan';
    const UPDATED = 'Data telah disimpan';
    const DELETED = 'Data telah dihapus';

    const ERROR_SAVING = 'Gagal menyimpan data. Hubungi pengembang web.';
    const ERROR_UPDATING = 'Gagal mengubah data. Hubungi pengembang web.';
    const ERROR_DELETING = 'Gagal menghapus data. Hubungi pengembang web.';

    const ADDED_ITEM = 'Barang telah ditambahkan.';
    const REMOVED_ITEM = 'Barang telah dihapus.';
    const ERROR_ADDING_ITEM = 'Gagal menambahkan barang. Hubungi pengembang web.';
    const ERROR_REMOVING_ITEM = 'Gagal menghapus barang. Hubungi pengembang web.';

    const ITEM_EMPTY = 'Tidak ada barang untuk disimpan.';

    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }
}
