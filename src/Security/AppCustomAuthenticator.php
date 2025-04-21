<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;


use App\Entity\Empresa;
use App\Repository\EmpresaRepository;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
//use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Doctrine\Persistence\ManagerRegistry;
use DateTimeInterface;


class AppCustomAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator, ManagerRegistry $doctrine)
    {
        $this->urlGenerator = $urlGenerator;
        $this->doctrine = $doctrine;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        //$request->getSession()->set(Security::LAST_USERNAME, $email);
        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
        $user = $token->getUser();
        var_dump($user);

        //$rol_activo = $user->getRoles();
        if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
            return new RedirectResponse('dashboard_admin');
        }
        if (in_array('ROLE_USER', $user->getRoles(), true)) {
            $codNivel = $user->getNivel();
            $activo = $user->getActivo();
            if ($activo == 1) {
                switch ($codNivel) {
                    case "5": //--- individuales
                        return new RedirectResponse('dashboard');
                        break;
                    case "100": //--- empresas
                        return new RedirectResponse('app_empresa_index');
                        break;
                }
            } else {
                return new RedirectResponse('/');
            }
        }
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
