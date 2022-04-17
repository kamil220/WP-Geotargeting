async function getData() {
    const cacheVersion = '1.0.0';
    const cacheName    = `geotargeting-${ cacheVersion }`;

    /** Only unsecure protocol available in free version. Limits to 45 requests per minute **/
    const url          = 'http://ip-api.com/json/?fields=message,countryCode';
    let cachedData     = await getCachedData( cacheName, url );

    if ( cachedData ) {
        return cachedData;
    }

    const cacheStorage = await caches.open( cacheName );
    await cacheStorage.add( url );
    cachedData = await getCachedData( cacheName, url );
    await deleteOldCaches( cacheName );

    return await cachedData;
}

async function getCachedData( cacheName, url ) {
    const cacheStorage   = localStorage.getItem( cacheName );

    if ( ! cacheStorage || !cacheStorage.countryCode ) {
        return false;
    }

    return cacheStorage.countryCode;
}

async function deleteOldCaches( currentCache ) {
    const keys = await caches.keys();

    for ( const key of keys ) {
        const isOurCache = 'geotargeting-' === key.substr( 0, 6 );

        if ( currentCache === key || ! isOurCache ) {
            continue;
        }

        await caches.delete(key);
    }
}

try {
    const data = getData();
    console.log( { data } );
} catch ( error ) {
    console.error( { error } );
}
