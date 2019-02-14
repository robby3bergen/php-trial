<?php
/**
 * Created by PhpStorm.
 * User: robby
 * Date: 8-2-2019
 * Time: 14:18
 */

namespace App\Controller;


use App\Entity\Member;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class NavigationController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */

    public function home() {
        // sample data (real data might come from a CMS)
        $articles = [
          [
            'title' => 'Basketbal',
            'imageUrl' => '/images/basketball.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consectetur consequuntur dolorem eaque error, fuga fugiat nemo nisi nobis nostrum nulla quae quisquam repellendus reprehenderit sequi suscipit temporibus vitae.'
          ],
          [ 'title' => 'Boksen',
            'imageUrl' => '/images/boxing.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consectetur consequuntur dolorem eaque error, fuga fugiat nemo nisi nobis nostrum nulla quae quisquam repellendus reprehenderit sequi suscipit temporibus vitae.'
          ],
          [ 'title' => 'Hardlopen',
            'imageUrl' => '/images/running.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consectetur consequuntur dolorem eaque error, fuga fugiat nemo nisi nobis nostrum nulla quae quisquam repellendus reprehenderit sequi suscipit temporibus vitae.'
          ],
          [ 'title' => 'Zwemmen',
            'imageUrl' => '/images/swimming.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consectetur consequuntur dolorem eaque error, fuga fugiat nemo nisi nobis nostrum nulla quae quisquam repellendus reprehenderit sequi suscipit temporibus vitae.'
          ],
          [ 'title' => 'Tennis',
            'imageUrl' => '/images/tennis.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consectetur consequuntur dolorem eaque error, fuga fugiat nemo nisi nobis nostrum nulla quae quisquam repellendus reprehenderit sequi suscipit temporibus vitae.'
          ]
        ];

        return $this->render('home.html.twig', ['articles' => $articles]);
    }

    /**
     * @Route("/lid-worden", name="lid_worden", methods={"GET"})
     */

    public function getMemberData() {
        $userId = $this->getUser()->getId();
        dump($userId);
        $membership = $this->getDoctrine()->getRepository(Member::class)->find($userId);
        $membership !== null ? $firstName = $membership->getFirstName() : $firstName = 'Test';

        return $this->render('lid_worden.html.twig', ['membership' => $membership]);
    }

    // TODO:
    // @Route 'page-not-found'

    /**
     * @Route("/lidmaatschap-instellen", name="lidmaatschap_instellen", methods={"POST"})
     */

    public function setMemberData(Request $request) {
        $userId = $this->getUser()->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $member = new Member();

        // TODO: get form data
        $firstName =  $request->get('_firstName');

        // TODO: validate form data
        //

        // TODO: save form data
        $member->setFirstName($firstName)->setCategory('race')->setCity('Driebergen')->setHousenumber('175')->setLastName('van Rheenen')->setMembershipFee(250)->setPostalCode('3972 DE')->setStreet('Damhertlaan')->setUser($this->getUser());

        $entityManager->persist($member);

        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}