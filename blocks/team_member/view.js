$(document).ready(function () {
    function cssVarExists(varName) {
        const value = getComputedStyle(document.documentElement).getPropertyValue(varName);
        return value.trim() !== "";
    }

    const root = $(':root').get(0).style;

    if (!cssVarExists('--bs-gray-100')) {
        root.setProperty('--bs-gray-100', '#f8f9fa');
    }

    if (!cssVarExists('--bs-primary')) {
        root.setProperty('--bs-primary', '#0d6efd');
    }
});