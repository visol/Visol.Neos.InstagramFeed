# Visol.Neos.InstagramFeed

#### Neos package that provides an instagram feed Node Type using an EEL helper

This package is currently rather a proof of concept than a out of the box solution. It will hopefully evolve to a flexible package allowing to display a bunch of images of an Instagram account.

It depends on Fusion AFX.

## Installation

1. Install the package

```
composer require visol/neos-instagramfeed
```

2. Generate an Instagram access token and add the configuration to your `Settings.yaml` file:

```
Visol:
  Neos:
    InstagramFeed:
      accessToken: 'your-access-token'
```

See more information about the access token below.

3. Either insert the plugin "Instagram Feed" or use the Fusion Object `Visol.Neos.InstagramFeed:InstagramFeed` on your page to embed the images.

4. The package currently uses [lazysizes](https://github.com/aFarkas/lazysizes) and the bgset plugin to load the image. So you must insert these two JavaScripts to your site. Lazysizes does not need any further configuration.

5. Provide your own styles to format the feed. By default, Bootstrap markup is used. The configuration belows how the CSS classes can be changed.

### Configuration

```
Visol:
  Neos:
    InstagramFeed:
      # Generate access token, e.g. at http://instagram.pixelunion.net
      accessToken: 'set-valid-token'
      # Lifetime of the cache entry for the feed
      cacheLifetime: '3600'
      # Number of images to display
      numberOfImages: 6
      # CSS classes for wrapping all images
      imagesWrapperCssClassAttribute: 'row'
      # CSS classes for wrapping a single image
      imageContainerCssClassAttribute: 'instagram-image-container col-xs-6 col-sm-3 col-md-2'
```

### Instagram Access Token

Instagram uses OAuth 2.0 for authentication and only allows accessing the API with a valid access token. This package currently doesn't handle generating access tokens itself, so you need to provide your own access token. You may use a 3rd party service, e.g. http://instagram.pixelunion.net/, to create one.

Please note that while access tokens do not have an expiration time, they might be revoked e.g. by the user. So in future, generating the access token should be handled by this package. https://www.instagram.com/developer/authentication/

### To Do

* Implement generating the access token.
* Allow the override configuration from plugin inspector.
* Don't depend on lazysizes for responsive images
* Determine possible errors and implement a better error handling.

Feel free to provide pull requests to help improve the functionality.

### Credits

visol digitale Dienstleistungen GmbH, www.visol.ch
