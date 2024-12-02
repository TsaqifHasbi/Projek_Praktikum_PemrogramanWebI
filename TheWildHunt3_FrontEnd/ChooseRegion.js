// Add interactivity to each region card
document.querySelectorAll('.region-card').forEach(card => {
    card.addEventListener('click', () => {
      alert(`You selected ${card.querySelector('p').textContent}!`);
    });
  });
  