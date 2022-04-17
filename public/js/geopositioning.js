async function getData() {
    const cacheVersion = '1.0.3';
    const cacheName    = `geotargeting-${ cacheVersion }`;
    const url          = 'https://ipwhois.app/json/';

    let cachedData     = await getCachedData( cacheName );

    if ( cachedData ) {
        return cachedData;
    }

    let countryCode = await fetchCountryCode(url) || '';
    localStorage.setItem( cacheName, countryCode.toString() );

    return await countryCode;
}

async function fetchCountryCode( url ) {
    return await fetch( url )
        .then(response => response.json())
        .then(data => data?.country_code);
}

async function getCachedData( cacheName ) {
    const cachedData = localStorage.getItem( cacheName );

    if( !cachedData ) {
        return false;
    }

    return cachedData;
}

function countryAction( country ) {

    if( country !== 'US' ) {
        return;
    }

    window.addEventListener( 'DOMContentLoaded', () => {
        console.log( 'The system detects that you are from the US. Some of the content may be unavailable.\n' );

        /** Hide career page **/
        document.querySelector( '#menu-item-5279' ).style.display = 'none';

        /* Redirect from home page to us home page */
        if( document.querySelector( 'body.home' ) && !window.location.href.match(/us\/?$/i) ) {
            window.location.assign( '/us' );
        }
    });
}

getData()
    .then( ( response ) => countryAction( response ) );
