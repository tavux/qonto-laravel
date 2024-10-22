<?php

namespace Tavux\Qonto\Laravel;

use Tavux\Qonto\Models\Attachment;
use Tavux\Qonto\Models\Label;
use Tavux\Qonto\Models\Labels;
use Tavux\Qonto\Models\Membership;
use Tavux\Qonto\Models\Memberships;
use Tavux\Qonto\Models\Organization;
use Tavux\Qonto\Models\Transaction;
use Tavux\Qonto\Models\Transactions;
use Tavux\Qonto\QontoClient;

/**
 * Class Qonto
 * @package Tavux\Qonto\Laravel
 *
 * @method static Attachment getAttachment(string $id)
 * @method static Organization getOrganization(string $id)
 * @method static Labels listLabels(int $current_page=null, int $per_page=null)
 * @method static Memberships listMemberships(int $current_page=null, int $per_page=null)
 * @method static Transactions listTransactions($slug, string $iban=null, string $status=null, string $updated_at_from=null, string $updated_at_to=null, string $settled_at_from=null, string $settled_at_to=null, string $sort_by=null, int $current_page=null, int $per_page=null)
 * @method static void setCredentials($login, $secret_key)
 */
class Qonto {

    /**
     * @var QontoClient
     */
    protected $qonto;

    public function __construct()
    {
        $this->qonto = new QontoClient(config('qonto.login'), config('qonto.secret_key'));
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->qonto, $name), $arguments);
    }

}
