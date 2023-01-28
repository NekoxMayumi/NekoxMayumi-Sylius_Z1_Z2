<?php
declare(strict_types=1);
namespace App\Listener;

use SM\Factory\FactoryInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\ProductReviewTransitions;
use Sylius\Component\Review\Model\ReviewInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

final class ReviewCreationListener
{
    /**
     * @var FactoryInterface
     */
    private FactoryInterface $stateMachineFactory;

    public function __construct(FactoryInterface $stateMachineFactory)
    {
        $this->stateMachineFactory = $stateMachineFactory;
    }

    public function acceptForTrustedAuthor(GenericEvent $event): void
    {
        /** @var ReviewInterface $review */
       $review = $event->getSubject();

        /** @var CustomerInterface $author */
       $author = $review->getAuthor();

       if ($author->getGroup() === null || $author->getGroup()->getCode() !== 'TRUSTED'){
           return;
       }

     $stateMachine =  $this->stateMachineFactory->get($review, ProductReviewTransitions::GRAPH);
       $stateMachine->apply(ProductReviewTransitions::TRANSITION_ACCEPT);
    }
}
