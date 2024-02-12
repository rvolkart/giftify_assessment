<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magic Test</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.magicthegathering.io/v1/cards',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$resultArray = json_decode($response, true);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2>All cards</h2><br>
            <table id="cards-list" class="display table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Mana cost</th>
                    <th>CMC</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;
                foreach ($resultArray['cards'] as $card) {
                    if(!isset($card['imageUrl']))
                        continue;
                    ?>
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><img src="<?= $card['imageUrl'] ?>" alt=""></td>
                        <td><?= $card['name'] ?></td>
                        <td><?= $card['manaCost'] ?></td>
                        <td><?= $card['cmc'] ?> manas</td>
                        <td><div class="btn btn-primary btn-add-card"
                                 data-imageurl="<?= $card['imageUrl'] ?>"
                                 data-name="<?= $card['name'] ?>"
                                 data-manacost="<?= $card['manaCost'] ?>"
                                 data-cmc="<?= $card['cmc'] ?>">Add</div></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
        <div class="col-12 col-lg-6">
            <div class="alert alert-info">

                <div class="row">
                    <div class="col-8">
                        <h2>My deck</h2><br>
                        <table id="my-deck" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Mana cost</th>
                                <th>CMC</th>
                            </tr>
                            </thead>
                            <tbody id="my-deck-records">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <h4>Deck details</h4>
                        <div>
                            Cards count:
                            <strong><span id="deck-cards-count">0</span> cards</strong>
                        </div>
                        <div>
                            Sum of mana cost:
                            <strong><span id="deck-sum-mana-cost">0</span> manas</strong>
                        </div>
                        <div>
                            Average mana cost:
                            <strong><span id="deck-average-mana-cost">0</span> manas</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>