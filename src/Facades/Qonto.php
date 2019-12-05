<?php

namespace Tavux\Qonto\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Tavux\Qonto\Models\Attachment;
use Tavux\Qonto\Models\Label;
use Tavux\Qonto\Models\Membership;
use Tavux\Qonto\Models\Organization;
use Tavux\Qonto\Models\Transaction;

/**
 * Class Qonto
 * @package Tavux\Qonto\Laravel\Facades
 *
 * @method static Attachment getAttachment(string $id)
 * @method static Organization getOrganization(string $id)
 * @method static Label[] listLabels(int $current_page=null, int $per_page=null)
 * @method static Membership[] listMemberships(int $current_page=null, int $per_page=null)
 * @method static Transaction[] listTransactions($slug, string $iban=null, string $status=null, string $updated_at_from=null, string $updated_at_to=null, string $settled_at_from=null, string $settled_at_to=null, string $sort_by=null, int $current_page=null, int $per_page=null)
 * @see \Tavux\Qonto\Laravel\Qonto
 */
class Qonto extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'qonto';
    }
}
