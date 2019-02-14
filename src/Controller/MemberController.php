<?php
/**
 * Created by PhpStorm.
 * User: robby
 * Date: 12-2-2019
 * Time: 13:55
 */

namespace App\Controller;

use App\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemberController extends AbstractController
{
    public function getMemberships($userId) {

        return $this->render('member_details.html.twig');
    }
}