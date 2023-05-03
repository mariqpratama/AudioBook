<div class="d-flex justify-content-between align-items-center p-3">
    <div class="d-flex">
        <p class="fs-2" id="bookSelecion">Book Selection</p>
    </div>
    <div class="d-flex justify-content-between">
        <div class="d-flex dropdown px-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                Language Option
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                <li><a href="<?= BASEURL; ?>/Home/filterLanguage/Indonesia" style="text-decoration:none"><button class="dropdown-item dil" type="button">Indonesia</button></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a href="<?= BASEURL; ?>/Home/filterLanguage/Inggris" style="text-decoration:none"><button class="dropdown-item dil" type="button">Inggris</button></a></li>

            </ul>
        </div>

        <div class="d-flex dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuGenre" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                Genre Option
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li>
                    <h6 class="dropdown-header" id="dropdownMenuSelectGenre">Select some genres</h6>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/Fable" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">Fable</button>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/Legend" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">Legend</button>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/Fiction" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">Fiction</button>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/NonFiction" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">NonFiction</button>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/Romantic" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">Romantic</button>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown-item">
                        <a href="<?= BASEURL; ?>/Home/filterGenre/History" style="text-decoration:none">
                            <button class="dropdown-item dil" type="button">History</button>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="d-flex flex-column justify-content-between">
    <div class="d-flex justify-content-between p-3 flex-wrap">
        <?php foreach ($data['details'] as $details) : ?>
            <div class="card mb-3" style="width: 450px;">
                <div class="d-flex flex-row align-items-center">
                    <div class="d-flex flex-column p-2">
                        <img src="<?= BASEURL; ?><?= $details['IMAGE']; ?>" class="img-thumbnail" alt="..." style="width: 250px;">
                    </div>
                    <div class="d-flex flex-column">
                        <div class="card-body">
                            <h4 class="card-title"><a href="<?= BASEURL; ?>/detail/<?= $details['ID']; ?>" style="text-decoration: none; color: black;"><?= $details['TITLE']; ?></a></h4>
                            <p class="card-text"><i class="fas fa-globe"></i> <a class="text-reset" href="<?= $details['SOURCE']; ?>" id="sourceStory">Story Source</a></p>
                            <p class="card-text"><i class="fas fa-book-open"></i> <?= $details['GENRE']; ?></p>
                            <p class="card-text"><i class="far fa-clock"></i> <?= $details['DURATION']; ?></p>
                            <p class="card-text"><i class="fas fa-language"></i> <?= $details['LANGUAGE']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>