<?php
require_once 'includes/header.php';
require_once 'config/db.php';

$sql_top_pets = "SELECT PetID, PetName, ImageURL FROM pets WHERE PetAvail = '1' ORDER BY ViewCount DESC LIMIT 3";
$result_top_pets = $db->query($sql_top_pets);
$top_pets = [];
if ($result_top_pets) {
    while ($row = $result_top_pets->fetch_assoc()) {
        $top_pets[] = $row;
    }
}

$species_filter = isset($_GET['species']) ? $_GET['species'] : '';
$sql = "SELECT p.PetID, p.PetName, p.ImageURL, s.SpeciesName, p.gender, p.personality_tags 
        FROM pets p 
        JOIN species s ON p.SpeciesID = s.SpeciesID 
        WHERE p.PetAvail = '1'";

if ($species_filter !== '') {
    $sql .= " AND p.SpeciesID = ?";
}
$sql .= " ORDER BY p.PetName ASC";

$stmt = $db->prepare($sql);
if ($species_filter !== '') {
    $stmt->bind_param("i", $species_filter);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <?php foreach (array_keys($top_pets) as $index): ?>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $index + 2; ?>" aria-label="Slide <?php echo $index + 3; ?>"></button>
        <?php endforeach; ?>
    </div>
    
    <div class="carousel-inner" style="border-radius: 20px;">
        <div class="carousel-item active">
            <div class="hero-section">
                <h1 class="display-4 fw-bold">Find Your Forever Friend</h1>
                <p class="lead">Every pet deserves a loving home. Your new best friend is waiting for you.</p>
            </div>
        </div>

        <div class="carousel-item">
            <div class="how-to-adopt-section text-center">
                <h2 class="mb-4" style="color: #6a0dad; font-weight: 600;">Our Adoption Process</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="step-circle">1</div>
                        <h5 class="fw-bold">Browse Pets</h5>
                        <p class="text-muted">Explore our list of wonderful pets and add your favorites to your Carrier.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="step-circle">2</div>
                        <h5 class="fw-bold">Submit an Inquiry</h5>
                        <p class="text-muted">Contact us using the details on their profile to schedule a meeting.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="step-circle">3</div>
                        <h5 class="fw-bold">Welcome Home</h5>
                        <p class="text-muted">Finalize the adoption and welcome your new friend home!</p>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($top_pets as $top_pet): ?>
            <div class="carousel-item">
                <div class="hero-section-featured" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo htmlspecialchars($top_pet['ImageURL']); ?>');">
                    <h5 class="mb-3"><span class="badge bg-warning">Most Viewed Pet</span></h5>
                    <h1 class="display-4 fw-bold"><?php echo htmlspecialchars($top_pet['PetName']); ?></h1>
                    <a href="view_pet.php?id=<?php echo $top_pet['PetID']; ?>" class="btn btn-light btn-lg mt-3">Click to View Profile</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="d-flex justify-content-center my-4">
    <div class="btn-group" role="group">
        <a href="index.php" class="btn btn-outline-primary <?php if($species_filter=='') echo 'active'; ?>">All Pets</a>
        <a href="index.php?species=0" class="btn btn-outline-primary <?php if($species_filter=='0') echo 'active'; ?>">Dogs</a>
        <a href="index.php?species=1" class="btn btn-outline-primary <?php if($species_filter=='1') echo 'active'; ?>">Cats</a>
    </div>
</div>

<div class="row">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($pet = $result->fetch_assoc()): 
            $is_favorited = isset($_SESSION['favorites']) && in_array($pet['PetID'], $_SESSION['favorites']);
        ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card pet-card h-100">
                     <a href="view_pet.php?id=<?php echo $pet['PetID']; ?>">
                        <img src="<?php echo htmlspecialchars($pet['ImageURL']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($pet['PetName']); ?>">
                    </a>
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fs-4 fw-bold" style="color: #5a189a;"><?php echo htmlspecialchars($pet['PetName']); ?></h5>
                        <p class="card-text text-secondary mb-2"><?php echo htmlspecialchars($pet['SpeciesName']); ?></p>
                        <div class="mb-3">
                            <span class="pet-tag bg-info-subtle text-info-emphasis"><?php echo htmlspecialchars($pet['gender']); ?></span>
                            <?php if(!empty($pet['personality_tags'])):
                                $tags = explode(',', $pet['personality_tags']);
                                foreach($tags as $tag): ?>
                                    <span class="pet-tag bg-warning-subtle text-warning-emphasis"><?php echo htmlspecialchars(trim($tag)); ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="mt-auto">
                           <a href="view_pet.php?id=<?php echo $pet['PetID']; ?>" class="btn btn-custom mb-2">Meet Me!</a>
                           <a href="manage_favorites.php?id=<?php echo $pet['PetID']; ?>" class="btn <?php echo $is_favorited ? 'btn-danger' : 'btn-outline-danger'; ?> btn-sm">
                               <?php echo $is_favorited ? 'In Carrier ♥' : 'Add to Carrier ♡'; ?>
                           </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col">
            <div class="alert alert-info text-center">
                <h4>No Pets Found</h4>
                <p>We couldn't find any pets matching your filter. Try another category!</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
$stmt->close();
$db->close();
require_once 'includes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.getElementById('heroCarousel');
    const carousel = new bootstrap.Carousel(carouselElement, {
        interval: 5000,
        wrap: true
    });
});
</script>