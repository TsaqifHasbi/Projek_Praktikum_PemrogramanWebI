document.querySelectorAll('.region-card').forEach(card => {
    card.addEventListener('click', () => {
      alert(`You selected ${card.querySelector('p').textContent}!`);
    });
  });

  document.addEventListener('DOMContentLoaded', () => {
    const regionCards = document.querySelectorAll('.region-card');
    const regionForm = document.getElementById('regionForm');
    const selectedRegionInput = document.getElementById('selectedRegion');

    regionCards.forEach(card => {
        card.addEventListener('click', () => {
            const region = card.getAttribute('data-region');
            selectedRegionInput.value = region;
            regionForm.submit();
        });
    });
});

  