@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container text-center">
            <h1>
                <p>GUIDE & REGLEMENT</p>
            </h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="top-bg">
                        <p>
                            <strong>
                                PAGE D’ACCUEIL :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                            Pronostiquez dès la page d’accueil en cliquant sur le Grand Prix annoncé.
                            </p>
                        </p>
                        <p>
                            <strong>
                                CALENDRIER :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                                Accédez au calendrier pour pronostiquer sur n’importe quel Grand Prix à venir.
                            </p>
                        </p>
                        <p>
                            <strong>
                                GRAND PRIX :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                                <p class="col-md-offset-6 col-md-10 text-left"> Faites votre pronostic avant le JEUDI 12 :00 précédent le Grand Prix. </p>
                                <ul class="col-md-offset-6 col-md-10 text-left">
                                    <li class="list-unstyled">
                                            Le JEUDI 12 :00 :
                                    </li>
                                    <li>
                                        Les pronostics sont fermés pour le Grand Prix
                                    </li>
                                    <li>
                                        Vous pouvez consulter les pronostics des autres Gentlemen en cliquant sur [Pronos & Resultats]
                                    </li>
                                </ul>
                                <p class="col-md-offset-6 col-md-11 text-left">
                                    Le DIMANCHE SOIR du Grand Prix (dès que l’organisateur aura rentré l’ordre d’arrivée des pilotes) : Vous pouvez consulter les résultats et le tableau des points en cliquant sur [Pronos & Resultats]

                                </p>
                            </p>
                        </p>
                        <p>
                            <strong>
                                CALCUL DES POINTS :
                            </strong>
                        <p class="col-md-offset-6 col-md-10 text-left">
                            Chaque pilote bien placé rapporte 25 points,
                            Si le pilote est placé à 1 place de différence (4è plutôt que 5e), il rapporte 18 points
                            Si le pilote est placé à 2 places de différence (3è plutôt que 5e), il rapporte 16 points
                            <p class="col-md-offset-6 col-md-10 text-left"> Ainsi de suite selon le tableau suivant :   </p>
                        <table class="table col-md-offset-6 col-md-10">
                            <thead>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                                <td>10</td>
                                <td>8</td>
                                <td>6</td>
                                <td>4</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                                <td>10</td>
                                <td>8</td>
                                <td>6</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                                <td>10</td>
                                <td>8</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                                <td>10</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>6</td>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>4</td>
                                <td>6</td>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>2</td>
                                <td>4</td>
                                <td>6</td>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td><FONT color="red">25</FONT></td>
                            </tr>

                            </tbody>
                        </table>
                        </p>
                        </p>
                        <p>
                            <strong>
                                POINTS BONUS :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                                <ul class="col-md-offset-6 col-md-10 text-left">
                                    <li>
                                        POLE (20 points) : le pilote placé en Pole Position est correct
                                    </li>
                                    <li>
                                        PODIUM (100 points) : les 3 premiers pilotes sont placés dans l’ordre
                                    </li>
                                    <li>
                                        DIUMPO (50 points) : le podium dans le désordre
                                    </li>
                                    <li>
                                        DUO (60 points) : les 2 premiers pilotes sont placés dans l’ordre
                                    </li>
                                    <li>
                                        UDO (30 points) : le duo dans le désordre
                                    </li>
                                    <li>
                                        VAINQUEUR (20 points) : le pilote vainqueur est placé correctement
                                    </li>
                                </ul>
                            </p>
                        </p>
                        <p>
                            <strong>
                                CLASSEMENT :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                                Vérifiez votre classement général pour la saison.
                                Accédez aux résultats d’un Grand Prix en cliquant sur son nom.
                            </p>
                        </p>
                        <p>
                            <strong>
                                HISTORIQUE :
                            </strong>
                            <p class="col-md-offset-6 col-md-10 text-left">
                                Accédez aux résultats des saisons précédentes (à partir de 2017).
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

