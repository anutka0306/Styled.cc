<?php

namespace App\Controller\Admin;

use App\Repository\PriceCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PriceCategoryTreeController extends AbstractController
{
    
    /**
     * @var PriceCategoryRepository
     */
    protected $price_category_repository;
    
    public function __construct(PriceCategoryRepository $price_category_repository)
    {
    
        $this->price_category_repository = $price_category_repository;
    }
    /**
     * @Route("/admin/price-category-tree", name="admin_price_category_tree")
     */
    public function index()
    {
        $categories = $this->price_category_repository->findRoots();
        return $this->render('admin/price_category_tree/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
