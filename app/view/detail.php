<div class="d-flex px-5 pt-4">
    <a href="<?= BASEURL; ?>/index">
        <button type="button" id="btnBack" class="btn btn-secondary btn-lg text-dark fw-bold" style="width: 150px;"><i class="fas fa-angle-double-left"></i> Back</button>
    </a>
</div>

<div class="d-flex flex-row justify-content-between p-5">
    <div class="d-flex flex-column justify-content-between ps-5">
        <div class="d-flex">
            <img src="<?= BASEURL; ?><?= $data['details']['IMAGE']; ?>" class="img-thumbnail" alt="..." style="width: 600px;">
        </div>
        <div class="d-flex py-3">
            <audio controls style="width: 400px;">
                <source src="<?= BASEURL; ?><?= $data['details']['AUDIO']; ?>" type="audio/mpeg">
            </audio>
        </div>
        <div class="d-flex">
            <div class="card" style="width: 400px;">
                <div class="card-body">
                    <p class="card-text"><i class="fas fa-globe"></i> <a class="text-reset" href="<?= $data['details']['SOURCE']; ?>" id="sourceStory">Story Source</a></p>
                    <p class="card-text"><i class="fas fa-book-open"></i> <?= $data['details']['GENRE']; ?></p>
                    <p class="card-text"><i class="fas fa-language"></i> <?= $data['details']['LANGUAGE']; ?></p>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex flex-column px-5">
        <div class="d-flex">
            <p class="text-start fs-2"><?= $data['details']['TITLE']; ?></p>
        </div>
        <div class="d-flex">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        <?= $data['details']['STORY']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>