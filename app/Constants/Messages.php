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

    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }
}
