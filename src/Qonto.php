<?php

namespace Tavux\Qonto\Laravel;

use Tavux\Qonto\Models\Attachment;
use Tavux\Qonto\Models\Label;
use Tavux\Qonto\Models\Membership;
use Tavux\Qonto\Models\Organization;
use Tavux\Qonto\Models\Transaction;
use Tavux\Qonto\Qonto as QontoClient;

/**
 * Class Qonto
 * @package Tavux\Qonto\Laravel
 *
 * @method static Attachment getAttachment(string $id)
 * @method static Organization getOrganization(string $id)
 * @method static Label[] listLabels(int $current_page=null, int $per_page=null)
 * @method static Membership[] listMemberships(int $current_page=null, int $per_page=null)
 * @method static Transaction[] listTransactions($slug, string $iban=null, string $status=null, string $updated_at_from=null, string $updated_at_to=null, string $settled_at_from=null, string $settled_at_to=null, string $sort_by=null, int $current_page=null, int $per_page=null)
 */
class Qonto {

    /**
     * @var QontoClient
     */
    protected $qonto;

    public function __construct()
    {
        $this->qonto = new QontoClient(config('qonto.login'), config('qonto.password'));
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->qonto, $name), $arguments);
    }

}
