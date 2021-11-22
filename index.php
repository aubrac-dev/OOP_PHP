<?php


declare(strict_types=1);


namespace Domain\Mixins {
    // ce trait fourni le nécessaire pour gérer du contenu 
    trait ContentAware
    {
        protected string $content;

        public function getContent()
        {
            return $this->content;
        }

        public function setContent(string $content)
        {
            $this->content = $content;
        }
    }

    use Domain\user\User;

    // ce trait fourni le nécessaire pour gérer un auteur
    trait UserAware
    {
        protected User $author;

        public function getAuthor()
        {
            return $this->author;
        }

        public function setAuthor(User $author)
        {
            $this->author = $author;
        }
    }
}


namespace Domain\User {
    class User
    {
        public function __construct(public string $name)
        {
        }
    }
}


namespace Domain\Forum {

    use Domain\Mixins;

    // A présent nous avons une classe Message utilisant ces 2 traits
    // En créant plus tard une seconde classe Message mais appartenant au domaine des notifications par exemple, celle ci pourra utiliser également les traits :)
    class Message
    {
        use Mixins\ContentAware, Mixins\UserAware;
    }
}

namespace {

    use Domain\Forum\Message;
    use Domain\User\User;

    $message = new Message;
    $message->setContent('Hello');
    $message->setAuthor(new User('greg'));

    echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
}
