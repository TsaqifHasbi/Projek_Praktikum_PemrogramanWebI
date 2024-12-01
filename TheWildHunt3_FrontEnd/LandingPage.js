// Add any interactivity here if needed
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', () => {
      alert(`You clicked on ${button.textContent}!`);
    });
  });
  