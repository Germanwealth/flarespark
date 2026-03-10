/**
 * Smooth scroll animations and interactive effects
 */

document.addEventListener('DOMContentLoaded', function() {
  // Smooth scroll behavior
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });

  // Observe elements for fade-in animation on scroll
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  // Observe all elements with animation classes
  document.querySelectorAll('[style*="animation"]').forEach(el => {
    observer.observe(el);
  });

  // Add subtle hover scale effect to buttons
  document.querySelectorAll('button, .btn, a.btn-primary-hero, a.btn-secondary-hero').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
      this.style.transition = 'all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1)';
    });
  });

  // Prevent layout shift by ensuring scroll bar is always present
  document.documentElement.style.overflowY = 'scroll';

  // Track page scroll for analytics
  let lastScrollY = 0;
  window.addEventListener('scroll', () => {
    lastScrollY = window.scrollY;
  });

  // Add scroll-to-top button functionality
  const scrollToTop = () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  };

  // Mobile menu toggle (if hamburger menu exists)
  const navToggle = document.querySelector('.navbar-toggler');
  if (navToggle) {
    navToggle.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  }

  // Performance optimization: Debounce scroll events
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // Lazy load images
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src || img.src;
          img.classList.add('loaded');
          imageObserver.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
      imageObserver.observe(img);
    });
  }

  // Accessibility: Ensure keyboard navigation works smoothly
  document.addEventListener('keydown', (e) => {
    // Close mobile menu on escape
    if (e.key === 'Escape') {
      const navToggle = document.querySelector('.navbar-toggler');
      if (navToggle && navToggle.classList.contains('active')) {
        navToggle.click();
      }
    }
  });

  console.log('✨ Page animations initialized - PRISM Platform');
});

// Enhance button ripple effect on click
document.addEventListener('click', function(e) {
  if (e.target.matches('button, .btn, a.btn-primary-hero, a.btn-secondary-hero')) {
    const btn = e.target;
    const rect = btn.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Create ripple element
    const ripple = document.createElement('span');
    ripple.style.position = 'absolute';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.style.width = '20px';
    ripple.style.height = '20px';
    ripple.style.background = 'rgba(255, 255, 255, 0.5)';
    ripple.style.borderRadius = '50%';
    ripple.style.pointerEvents = 'none';
    ripple.style.animation = 'ripple 0.6s ease-out';
    
    // Only add ripple if button doesn't already have position style
    if (window.getComputedStyle(btn).position === 'static') {
      btn.style.position = 'relative';
      btn.style.overflow = 'hidden';
    }
  }
}, true);

// Add ripple animation to styles if not present
if (!document.getElementById('ripple-animation')) {
  const style = document.createElement('style');
  style.id = 'ripple-animation';
  style.textContent = `
    @keyframes ripple {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);
}
