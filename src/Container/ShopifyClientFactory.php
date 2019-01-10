<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrShopify\Container;

use Psr\Container\ContainerInterface;
use ZfrShopify\Exception\RuntimeException;
use ZfrShopify\ShopifyClient;

/**
 * Create and return an instance of the Shopify client.
 *
 * Register this factory for the `Zfr\Shopify\ShopifyClient` factory, and make sure to include the "config"
 * service (that must contains a "zfr_shopify" key). Supported configuration is:
 *
 * <code>
 *     'zfr_shopify' => [
 *         'shop'          => '', // a shop name, WITHOUT the ".myshopify.com" part (only required for private apps)
 *         'api_key'       => '', // an API key (only required for private apps)
 *         'access_token'  => '', // an access token that you got from the OAuth dance (only required for public apps)
 *         'password'      => '', // a password retrieved from private app (only required for private apps)
 *         'private_app'   => true, // true for private app, false for apps on App Store
 *     ]
 * </code>
 *
 * @author Michaël Gallego
 */
class ShopifyClientFactory
{
    /**
     * @param  ContainerInterface $container
     * @return ShopifyClient
     */
    public function __invoke(ContainerInterface $container): ShopifyClient
    {
        $config = $container->has('config') ? $container->get('config') : [];

        if (!isset($config['zfr_shopify'])) {
            throw new RuntimeException('Container config does not have a "zfr_shopify" key');
        }

        return new ShopifyClient($config['zfr_shopify']);
    }
}
