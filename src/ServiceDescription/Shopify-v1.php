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

return [
    'name'        => 'Shopify',
    'description' => 'Shopify is an awesome e-commerce platform',
    'operations'  => [
        /**
         * --------------------------------------------------------------------------------
         * ACCESS SCOPE RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/access/accessscope
         * --------------------------------------------------------------------------------
         */

        'GetAccessScopes' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/oauth/access_scopes.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of access scopes',
            'data'                 => ['root_key' => 'access_scopes'],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * STOREFRONT RELATED METHODS
         *
         * DOC: https://shopify.dev/docs/admin-api/rest/reference/access/storefrontaccesstoken
         * --------------------------------------------------------------------------------
         */

        'GetStorefrontAccessTokens' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/storefront_access_tokens.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of storefront access tokens',
            'data'                 => ['root_key' => 'storefront_access_tokens'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateStorefrontAccessToken' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/storefront_access_tokens.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new storefront token',
            'data'             => ['root_key' => 'storefront_access_token'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'StorefrontAccessToken title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteStorefrontAccessToken' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/storefront_access_tokens/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing storefront access token',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'StorefrontAccessToken ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * APPLICATION CHARGES RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/billing/applicationcharge
         * --------------------------------------------------------------------------------
         */

        'GetApplicationCharges' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/application_charges.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of application charges',
            'data'                 => ['root_key' => 'application_charges'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetApplicationCharge' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/application_charges/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific application charge',
            'data'             => ['root_key' => 'application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateApplicationCharge' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/application_charges.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new application charge',
            'data'             => ['root_key' => 'application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Application charge name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'return_url' => [
                    'description' => 'URL where Shopify must return once the charge has been accepted',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'ActivateApplicationCharge' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/application_charges/{id}/activate.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Activate a previously accepted application charge',
            'data'             => ['root_key' => 'application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * ARTICLE RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/article
         * --------------------------------------------------------------------------------
         */

        'GetArticles' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/articles.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of articles',
            'data'                 => ['root_key' => 'articles'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetArticleCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/articles/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of articles (for all blogs)',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlogArticles' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of articles for a given blog',
            'data'             => ['root_key' => 'articles'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlogArticleCount' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{blog_id}/articles/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of articles (for a single blog)',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to count articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetArticle' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific article',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetArticleMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/articles/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for an article',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlogArticle' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific article from a given blog',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetArticlesAuthors' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/articles/authors.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve list of all article authors',
            'data'          => ['root_key' => 'authors'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
        ],

        'GetArticlesTags' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles/tags.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve all tags for a given blog',
            'data'             => ['root_key' => 'tags'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateArticle' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/articles.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new article',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Article title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'CreateBlogArticle' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new article',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Article title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateArticle' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing article',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateBlogArticle' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing article',
            'data'             => ['root_key' => 'article'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteArticle' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing article',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteBlogArticle' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/blogs/{blog_id}/articles/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing article',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Article ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'blog_id' => [
                    'description' => 'Blog from which we need to extract articles',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * ASSETS RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/asset
         * --------------------------------------------------------------------------------
         */

        'GetAssets' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of assets for a given theme',
            'data'             => ['root_key' => 'assets'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetAsset' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a single asset',
            'data'             => ['root_key' => 'asset'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Complete key of the asset file',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true,
                    'sentAs'      => 'asset[key]'
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateAsset' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new asset in the given theme',
            'data'             => ['root_key' => 'asset'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Complete key of the asset file',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateAsset' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new asset in the given theme',
            'data'             => ['root_key' => 'asset'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Complete key of the asset file',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteAsset' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/themes/{theme_id}/assets.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing asset',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'theme_id' => [
                    'description' => 'Theme from which we need to extract assets',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Complete key of the asset file',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true,
                    'sentAs'      => 'asset[key]'
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * BLOGS RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/online-store/blog
         * --------------------------------------------------------------------------------
         */

        'GetBlogs' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/blogs.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of blogs',
            'data'             => ['root_key' => 'blogs'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlogMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for an blog',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlogCount' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/blogs/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of blogs',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetBlog' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/blogs/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a single blog',
            'data'             => ['root_key' => 'blog'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog to get',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateBlog' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/blogs.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new blog',
            'data'             => ['root_key' => 'blog'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Blog title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateBlog' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/blogs/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing blog',
            'data'             => ['root_key' => 'blog'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog to update',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteBlog' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/blogs/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing blog',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Blog id',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * CARRIER SERVICE RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/shipping-and-fulfillment/carrierservice
         * --------------------------------------------------------------------------------
         */

        'GetCarrierServices' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/carrier_services.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of carrier services',
            'data'                 => ['root_key' => 'carrier_services'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCarrierService' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific carrier service',
            'data'             => ['root_key' => 'carrier_service'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateCarrierService' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/carrier_services.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a carrier service',
            'data'             => ['root_key' => 'carrier_service'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Carrier service name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'callback_url' => [
                    'description' => 'Carrier service callback url',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateCarrierService' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a carrier service',
            'data'             => ['root_key' => 'carrier_service'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteCarrierService' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/carrier_services/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete a carrier service',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Carrier service ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * COLLECTION RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/products/collection
         * --------------------------------------------------------------------------------
         */

        'GetCollection' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/collections/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a collection',
            'data'                 => ['root_key' => 'collection'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCollectionProducts' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/collections/{id}/products.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of collection products',
            'data'                 => ['root_key' => 'products'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCollectionMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/collections/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for an collection',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * CUSTOM COLLECTION RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/customcollection
         * --------------------------------------------------------------------------------
         */

        'GetCustomCollections' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/custom_collections.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of custom collections',
            'data'                 => ['root_key' => 'custom_collections'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCustomCollectionCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/custom_collections/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of custom collections',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCustomCollection' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific custom collection',
            'data'             => ['root_key' => 'custom_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateCustomCollection' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/custom_collections.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a custom collection',
            'data'             => ['root_key' => 'custom_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Custom collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateCustomCollection' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a custom collection',
            'data'             => ['root_key' => 'custom_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteCustomCollection' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/custom_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete a custom collection',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * COLLECTS RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/products/collect
         * --------------------------------------------------------------------------------
         */

        'GetCollects' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/collects.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of collects',
            'data'                 => ['root_key' => 'collects'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCollectCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/collects/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of collects',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCollect' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/collects/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific collect',
            'data'             => ['root_key' => 'collect'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateCollect' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/collects.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Adds a product to a custom collection',
            'data'             => ['root_key' => 'collect'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'collection_id' => [
                    'description' => 'Custom collection ID',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteCollect' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/collects/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete a collect',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Collect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * CUSTOMER RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/customer
         * --------------------------------------------------------------------------------
         */

        'GetCustomers' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/customers.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of customers',
            'data'                 => ['root_key' => 'customers'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCustomerCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/customers/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of customers',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'SearchCustomers' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/search.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Searches for customers',
            'data'          => ['root_key' => 'customers'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order' => [
                    'description' => 'Field and direction to order results by',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ],
                'query' => [
                    'description' => 'Text to search customers',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true,
                ],
                'page' => [
                    'description' => 'Page to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false,
                ],
                'fields' => [
                    'description' => 'comma-separated list of fields to include in the response',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ],
            ],
        ],

        'GetCustomer' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Receive a single customer',
            'data'          => ['root_key' => 'customer'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCustomerMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/customers/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a customer',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateCustomer' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new customer',
            'data'          => ['root_key' => 'customer'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'email' => [
                    'description' => 'The email address of the customer',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false,
                ],
                'first_name' => [
                    'description' => 'The customer\'s first name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                ],
                'last_name' => [
                    'description' => 'The customer\'s last name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateCustomer' => [
            'httpMethod'    => 'PUT',
            'uri'           => 'admin/api/{version}/customers/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Modify an existing customer',
            'data'          => ['root_key' => 'customer'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteCustomer' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/customers/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Remove a customer from the database',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
        ],

        'CreateCustomerInvite' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/customers/{id}/send_invite.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Sends an account invite to a customer',
            'data'          => ['root_key' => 'customer_invite'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * DISCOUNT CODE RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/discounts/discountcode
         * --------------------------------------------------------------------------------
         */

        'GetDiscountCodes' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of discount codes',
            'data'                 => ['root_key' => 'discount_codes'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetDiscountCode' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific discount code',
            'data'             => ['root_key' => 'discount_code'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateDiscountCode' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new discount code for the given price rule',
            'data'             => ['root_key' => 'discount_code'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'code' => [
                    'description' => 'Code',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateDiscountCode' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing discount code',
            'data'             => ['root_key' => 'discount_code'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price_rule_id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteDiscountCode' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/price_rules/{price_rule_id}/discount_codes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing discount code',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific discount code ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * CUSTOMER ADDRESS RELATED METHODS
         *
         * DOC: https://shopify.dev/docs/admin-api/rest/reference/customers/customer-address
         * --------------------------------------------------------------------------------
         */

        'GetCustomerAddresses' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieves a list addresses for a customer',
            'data'                 => ['root_key' => 'addresses'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetCustomerAddress' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieves details of a single customer addresses',
            'data'                 => ['root_key' => 'customer_address'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateCustomerAddress' => [
            'httpMethod'           => 'POST',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Creates a new address for a customer',
            'data'                 => ['root_key' => 'customer_address'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'The customer address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'UpdateCustomerAddress' => [
            'httpMethod'           => 'PUT',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Update an existing address for a customer',
            'data'                 => ['root_key' => 'customer_address'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'address' => [
                    'description' => 'The customer address',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'DeleteCustomerAddress' => [
            'httpMethod'           => 'DELETE',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses/{id}.json',
            'responseModel'        => 'GenericModel',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'SetDefaultCustomerAddress' => [
            'httpMethod'           => 'PUT',
            'uri'                  => 'admin/api/{version}/customers/{customer_id}/addresses/{id}/default.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Update an existing address for a customer',
            'data'                 => ['root_key' => 'customer_address'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'customer_id' => [
                    'description' => 'Customer ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Address ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * EVENTS RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/events
         * --------------------------------------------------------------------------------
         */

        'GetEvents' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/events.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of events',
            'data'                 => ['root_key' => 'events'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetEventCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/events/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of events',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetEvent' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/events/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific event',
            'data'             => ['root_key' => 'event'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * FULFILLMENT RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/reference/fulfillment
         * --------------------------------------------------------------------------------
         */

        'GetFulfillments' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of fulfillments for a given order',
            'data'             => ['root_key' => 'fulfillments'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetFulfillmentCount' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/count.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve the number of fulfillments',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to count fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetFulfillment' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific order',
            'data'             => ['root_key' => 'fulfillment'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateFulfillment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a fulfillment for a given order',
            'data'             => ['root_key' => 'fulfillment'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateFulfillment' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a fulfillment for a given order',
            'data'             => ['root_key' => 'fulfillment'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'CompleteFulfillment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}/complete.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Complete a pending fulfillment',
            'data'             => ['root_key' => 'fulfillment'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        'CancelFulfillment' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillments/{id}/cancel.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Cancel a pending fulfillment',
            'data'             => ['root_key' => 'fulfillment'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Fulfillment ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract fulfillments',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * FULFILLMENT ORDER RELATED METHODS
         *
         * DOC: https://shopify.dev/docs/admin-api/rest/reference/shipping-and-fulfillment/fulfillmentorder
         * --------------------------------------------------------------------------------
         */

        'GetFulfillmentOrders' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/fulfillment_orders.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a list of fulfillment orders for a specific order',
            'data'             => ['root_key' => 'fulfillment_orders'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'The ID of the order that is associated with the fulfillment orders',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetFulfillmentOrder' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieves a specific fulfillment order',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'The ID of the fulfillment order to retrieve',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CancelFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/cancel.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks a fulfillment order as cancelled',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        'CloseFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/close.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks an in progress fulfillment order as incomplete, indicating the fulfillment service is unable to ship any remaining items and intends to close the fulfillment order',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        'MoveFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/move.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Moves a fulfillment order from one merchant managed location to another merchant managed location',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        'OpenFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/open.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Marks a scheduled fulfillment order as ready for fulfillment',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        'RescheduleFulfillmentOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/fulfillment_orders/{fulfillment_order_id}/move.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Updates the fulfill_at time of a scheduled fulfillment order',
            'data'             => ['root_key' => 'fulfillment_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'fulfillment_order_id' => [
                    'description' => 'Fulfillment Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * GIFT CARD RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/reference/gift_card
         * --------------------------------------------------------------------------------
         */

        'GetGiftCards' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/gift_cards.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Receive a list of all Gift Cards',
            'data'                 => ['root_key' => 'gift_cards'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetGiftCardCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/gift_cards/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of gift cards',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetGiftCard' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/gift_cards/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Receive a single Gift Card',
            'data'             => ['root_key' => 'gift_card'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
        ],

        'CreateGiftCard' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/gift_cards.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new Gift Card',
            'data'             => ['root_key' => 'gift_card'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'initial_value' => [
                    'description' => 'The initial Gift Card value',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateGiftCard' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/gift_cards/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update the Gift Card',
            'data'             => ['root_key' => 'gift_card'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DisableGiftCard' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/gift_cards/{id}/disable.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Disabling a Gift Card is permanent and cannot be undone',
            'data'             => ['root_key' => 'gift_card'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Gift Card ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * INVENTORY ITEM RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/reference/inventory/inventoryitem
         * --------------------------------------------------------------------------------
         */

        'GetInventoryItems' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/inventory_items.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of inventory items by passed identifiers',
            'data'                 => ['root_key' => 'inventory_items'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'ids' => [
                    'description' => 'Comma seperated list of IDs',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true,
                ],
                'page' => [
                    'description' => 'Page to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false,
                ],
            ],
        ],

        'GetInventoryItem' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/inventory_items/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a specific inventory item',
            'data'                 => ['root_key' => 'inventory_item'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Inventory Item ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'UpdateInventoryItem' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/inventory_items/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a specific inventory item',
            'data'             => ['root_key' => 'inventory_item'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Inventory Item ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * INVENTORY LEVEL RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/reference/inventory/inventorylevel
         * --------------------------------------------------------------------------------
         */

        'GetInventoryLevels' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/inventory_levels.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of inventory levels either by passed inventory item IDs, location IDs or both',
            'data'                 => ['root_key' => 'inventory_levels'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_ids' => [
                    'description' => 'Comma seperated list of inventory item IDs',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ],
                'location_ids' => [
                    'description' => 'Comma seperated list of location IDs',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ],
                'page' => [
                    'description' => 'Page to show',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                ],
                'limit' => [
                    'description' => 'Amount of results',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'min'         => 1,
                    'max'         => 250,
                    'required'    => false,
                ],
            ],
        ],

        'AdjustInventoryLevel' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/inventory_levels/adjust.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Adjusts the inventory level of an inventory item at a single location',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'available_adjustment' => [
                    'description' => 'The amount to adjust the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ]
        ],

        'DeleteInventoryLevel' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/inventory_levels.json',
            'responseModel' => 'GenericModel',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ]
        ],

        'ConnectInventoryLevel' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/inventory_levels/connect.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Connects an inventory item to a location by creating an inventory level at that location',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'relocate_if_necessary' => [
                    'description' => 'The amount to adjust the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                ],
            ]
        ],

        'SetInventoryLevel' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/inventory_levels/set.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Sets the inventory level for an inventory item at a location',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'inventory_item_id' => [
                    'description' => 'The inventory item id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'location_id' => [
                    'description' => 'The location id',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'available' => [
                    'description' => 'Sets the available inventory quantity',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'disconnect_if_necessary' => [
                    'description' => 'Whether inventory for any previously connected locations will be set to 0 and the locations disconnected',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => false,
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * LOCATION RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/reference/inventory/location
         * --------------------------------------------------------------------------------
         */

        'GetLocations' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/locations.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of locations',
            'data'                 => ['root_key' => 'locations'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetLocation' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/locations/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a specific location',
            'data'                 => ['root_key' => 'location'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Location ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetLocationCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/locations/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a count of locations',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetLocationInventoryLevels' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/locations/{id}/inventory_levels.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a specific location',
            'data'                 => ['root_key' => 'inventory_levels'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Location ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * METAFIELDS RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/metafield
         * --------------------------------------------------------------------------------
         */

        'GetMetafields' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/metafields.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of metafields',
            'data'                 => ['root_key' => 'metafields'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetMetafield' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/metafields/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific metafield',
            'data'             => ['root_key' => 'metafield'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateMetafield' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/metafields.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new metafield',
            'data'             => ['root_key' => 'metafield'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'namespace' => [
                    'description' => 'Namespace to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'key' => [
                    'description' => 'Key to use',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'value' => [
                    'description' => 'Value type',
                    'location'    => 'json',
                    'type'        => ['string', 'integer'],
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateMetafield' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/metafields/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a specific metafield',
            'data'             => ['root_key' => 'metafield'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'value' => [
                    'description' => 'Value type',
                    'location'    => 'json',
                    'type'        => ['string', 'integer'],
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteMetafield' => [
            'httpMethod'    => 'DELETE',
            'uri'           => 'admin/api/{version}/metafields/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Delete specific metafield',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Metafield ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * ORDER RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/order
         * --------------------------------------------------------------------------------
         */

        'GetOrders' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/orders.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of orders',
            'data'                 => ['root_key' => 'orders'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetOrderCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/orders/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of orders',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetOrder' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific order',
            'data'             => ['root_key' => 'order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for an order',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new order',
            'data'             => ['root_key' => 'order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'The order line items',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'CloseOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{id}/close.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Close a specific order',
            'data'             => ['root_key' => 'order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'OpenOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{id}/open.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Re-open a closed order',
            'data'             => ['root_key' => 'order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'UpdateOrder' => [
          'httpMethod'           => 'PUT',
          'uri'                  => 'admin/api/{version}/orders/{id}.json',
          'responseModel'        => 'GenericModel',
          'summary'              => 'Update an existing order',
          'data'                 => ['root_key' => 'order'],
          'parameters'           => [
              'version' => [
                  'description' => 'API version',
                  'location'    => 'uri',
                  'type'        => 'string',
                  'required'    => true
              ],
              'id' => [
                  'description' => 'Order ID',
                  'location'    => 'uri',
                  'type'        => 'integer',
                  'required'    => TRUE
              ],
          ],
          'additionalParameters' => [
            'location' => 'json',
          ],
        ],

        'CancelOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{id}/cancel.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Cancel a given order',
            'data'             => ['root_key' => null],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * DRAFT ORDER RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/orders/draftorder
         * --------------------------------------------------------------------------------
         */

        'GetDraftOrders' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/draft_orders.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of draft orders',
            'data'                 => ['root_key' => 'draft_orders'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetDraftOrderMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/draft_orders/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for an draft order',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetDraftOrderCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/draft_orders/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of draft orders',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetDraftOrder' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific draft order',
            'data'             => ['root_key' => 'draft_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateDraftOrder' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/draft_orders.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new draft order',
            'data'             => ['root_key' => 'draft_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'line_items' => [
                    'description' => 'The draft order line items',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'SendDraftOrderInvoice' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/draft_orders/{id}/send_invoice.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Send an invoice for the draft order',
            'data'             => ['root_key' => 'draft_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateDraftOrder' => [
            'httpMethod'           => 'PUT',
            'uri'                  => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Update an existing draft order',
            'data'                 => ['root_key' => 'draft_order'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteDraftOrder' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/draft_orders/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete the draft order from the database',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Draft order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'CompleteDraftOrder' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/draft_orders/{id}/complete.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Complete a draft order, marking it as paid',
            'data'             => ['root_key' => 'draft_order'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * PAGE RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/page
         * --------------------------------------------------------------------------------
         */

        'GetPages' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/pages.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of pages',
            'data'                 => ['root_key' => 'pages'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetPageCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/pages/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of pages',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetPage' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/pages/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific page',
            'data'             => ['root_key' => 'page'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetPageMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/pages/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a page',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreatePage' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/pages.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new page',
            'data'             => ['root_key' => 'page'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Page title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'body_html' => [
                    'description' => 'HTML content for the page',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdatePage' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/pages/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing page',
            'data'             => ['root_key' => 'page'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeletePage' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/pages/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing page',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Page ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRODUCT RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/product
         * --------------------------------------------------------------------------------
         */

        'GetProducts' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/products.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of products',
            'data'                 => ['root_key' => 'products'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/products/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of products',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProduct' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific product',
            'data'             => ['root_key' => 'product'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/products/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a product',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateProduct' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/products.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new product',
            'data'             => ['root_key' => 'product'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Product title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateProduct' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/products/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing product',
            'data'             => ['root_key' => 'product'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteProduct' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/products/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing product',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRODUCT IMAGES RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/product_image
         * --------------------------------------------------------------------------------
         */

        'GetProductImages' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{product_id}/images.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of product images',
            'data'             => ['root_key' => 'images'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductImageCount' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{product_id}/images/count.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve the number of images for a given product',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductImage' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific product image',
            'data'             => ['root_key' => 'image'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateProductImage' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/products/{product_id}/images.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new product image',
            'data'             => ['root_key' => 'image'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateProductImage' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing product image',
            'data'             => ['root_key' => 'image'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteProductImage' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/products/{product_id}/images/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing product image',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Product image ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * RECURRING APPLICATION CHARGES RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/recurringapplicationcharge
         * --------------------------------------------------------------------------------
         */

        'GetRecurringApplicationCharges' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/recurring_application_charges.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of recurring application charges',
            'data'                 => ['root_key' => 'recurring_application_charges'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetRecurringApplicationCharge' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific recurring application charge',
            'data'             => ['root_key' => 'recurring_application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific recurring application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateRecurringApplicationCharge' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/recurring_application_charges.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new recurring application charge',
            'data'             => ['root_key' => 'recurring_application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Plan name',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
                'return_url' => [
                    'description' => 'URL where Shopify must return once the charge has been accepted',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'ActivateRecurringApplicationCharge' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{id}/activate.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Activate a previously accepted recurring application charge',
            'data'             => ['root_key' => 'recurring_application_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific recurring application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        'DeleteRecurringApplicationCharge' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing recurring application charge',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific recurring application charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * REFUND RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/refund
         * --------------------------------------------------------------------------------
         */

        'GetRefunds' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/refunds.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of Refunds for an Order',
            'data'             => ['root_key' => 'refunds'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetRefund' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/orders/{order_id}/refunds/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific refund',
            'data'             => ['root_key' => 'refund'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'id' => [
                    'description' => 'Specific refund ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CalculateRefund' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{order_id}/refunds/calculate.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Calculate refund transactions based on line items and shipping',
            'data'             => ['root_key' => 'refund'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'CreateRefund' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/orders/{order_id}/refunds.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a Refund for an existing Order',
            'data'             => ['root_key' => 'refund'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * SHOP RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/shop
         * --------------------------------------------------------------------------------
         */

        'GetShop' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/shop.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Get data about a single shop',
            'data'                 => ['root_key' => 'shop'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * SMART COLLECTION RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/smartcollection
         * --------------------------------------------------------------------------------
         */

        'GetSmartCollections' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/smart_collections.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of smart collections',
            'data'                 => ['root_key' => 'smart_collections'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetSmartCollectionCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/smart_collections/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of smart collections',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetSmartCollection' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve specific smart collection',
            'data'             => ['root_key' => 'smart_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateSmartCollection' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/smart_collections.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a smart collection',
            'data'             => ['root_key' => 'smart_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Smart collection title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateSmartCollection' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update a smart collection',
            'data'             => ['root_key' => 'smart_collection'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteSmartCollection' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/smart_collections/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete a smart collection',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Smart collection ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * THEME RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/theme
         * --------------------------------------------------------------------------------
         */

        'GetThemes' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/themes.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of themes',
            'data'                 => ['root_key' => 'themes'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetTheme' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/themes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific theme',
            'data'             => ['root_key' => 'theme'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateTheme' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/themes.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new theme',
            'data'             => ['root_key' => 'theme'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Name of the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'src' => [
                    'description' => 'Zip source for the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateTheme' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/themes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing theme',
            'data'             => ['root_key' => 'theme'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific theme ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'name' => [
                    'description' => 'Name of the theme',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteTheme' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/themes/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing theme',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific theme ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRICE RULE RELATED METHODS
         *
         * DOC: https://help.shopify.com/en/api/reference/discounts/pricerule
         * --------------------------------------------------------------------------------
         */

        'GetPriceRules' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/price_rules.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of price rules',
            'data'                 => ['root_key' => 'price_rules'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetPriceRule' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific price rule',
            'data'             => ['root_key' => 'price_rule'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreatePriceRule' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/price_rules.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new price rule',
            'data'             => ['root_key' => 'price_rule'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'title' => [
                    'description' => 'Price rule title',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'target_type' => [
                    'description' => 'Price rule target type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['line_item', 'shipping_line'],
                ],
                'target_selection' => [
                    'description' => 'Price rule target selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['all', 'entitled'],
                ],
                'value_type' => [
                    'description' => 'Price rule value type',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['fixed_amount', 'percentage'],
                ],
                'value' => [
                    'description' => 'Price rule value',
                    'location'    => 'json',
                    'type'        => 'integer',
                    'required'    => true,
                ],
                'allocation_method' => [
                    'description' => 'Price rule allocation method',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['each', 'across']
                ],
                'starts_at' => [
                    'description' => 'Price rule starts at date',
                    'location'    => 'json',
                    'type'        => 'string',
                    'format'      => 'date-time',
                    'required'    => true
                ],
                'customer_selection' => [
                    'description' => 'Price rule customer selection',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['all', 'prerequisite']
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdatePriceRule' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing price rule code',
            'data'             => ['root_key' => 'price_rule'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeletePriceRule' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/price_rules/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing price rule',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific price rule ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * PRODUCT VARIANT RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/product_variant
         * --------------------------------------------------------------------------------
         */

        'GetProductVariants' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{product_id}/variants.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Get all variants for the given product',
            'data'             => ['root_key' => 'variants'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductVariantCount' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/products/{product_id}/variants/count.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve the number of variants for a given product',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductVariant' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/variants/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific variant',
            'data'             => ['root_key' => 'variant'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetProductVariantMetafields' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/variants/{id}/metafields.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of metafields for a variant',
            'data'          => ['root_key' => 'metafields'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateProductVariant' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/products/{product_id}/variants.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new variant',
            'data'             => ['root_key' => 'variant'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateProductVariant' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/variants/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing variant',
            'data'             => ['root_key' => 'variant'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteProductVariant' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/products/{product_id}/variants/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing variant for the given product',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific variant ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'product_id' => [
                    'description' => 'Specific product ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * REDIRECT RELATED METHODS
         *
         * DOC: https://help.shopify.com/api/reference/redirect
         * --------------------------------------------------------------------------------
         */

        'GetRedirects' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/redirects.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of redirects',
            'data'                 => ['root_key' => 'redirects'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetRedirectCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/redirects/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of redirects',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetRedirect' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/redirects/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific redirect',
            'data'             => ['root_key' => 'redirect'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Redirect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateRedirect' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/redirects.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a redirect',
            'data'             => ['root_key' => 'redirect'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'path' => [
                    'description' => 'Path URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'target' => [
                    'description' => 'Target URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'UpdateRedirect' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/redirects/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing redirect',
            'data'             => ['root_key' => 'redirect'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'path' => [
                    'description' => 'Path URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'target' => [
                    'description' => 'Target URL',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ]
        ],

        'DeleteRedirect' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/redirects/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing redirect',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Redirect ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * SCRIPT TAGS RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/scripttag
         * --------------------------------------------------------------------------------
         */

        'GetScriptTags' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/script_tags.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of installed script tags',
            'data'                 => ['root_key' => 'script_tags'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetScriptTagCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/script_tags/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of script tags',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetScriptTag' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a single script tag',
            'data'             => ['root_key' => 'script_tag'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to retrieve',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateScriptTag' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/script_tags.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new script tags',
            'data'             => ['root_key' => 'script_tag'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'event' => [
                    'description' => 'Event value when the script tag is loaded',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['onload'],
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateScriptTag' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing script tag',
            'data'             => ['root_key' => 'script_tag'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to update',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'event' => [
                    'description' => 'Event value when the script tag is loaded',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['onload'],
                ],
                'src' => [
                    'description' => 'URL of the script tag',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteScriptTag' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/script_tags/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing script tag',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Script tag ID to delete',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * SHIPPING ZONE RELATED METHODS
         *
         * DOC: https://shopify.dev/docs/admin-api/rest/reference/store-properties/shippingzone
         * --------------------------------------------------------------------------------
         */

        'GetShippingZones' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/shipping_zones.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of all shipping zones',
            'data'                 => ['root_key' => 'shipping_zones'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * TRANSACTION RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/transaction
         * --------------------------------------------------------------------------------
         */

        'GetTransactions' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a list of transactions for a given order',
            'data'          => ['root_key' => 'transactions'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetTransactionCount' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/count.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve the number of script tags',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to count transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetTransaction' => [
            'httpMethod'    => 'GET',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions/{id}.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Retrieve a specific transaction',
            'data'          => ['root_key' => 'transaction'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Transaction ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateTransaction' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/orders/{order_id}/transactions.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new transaction for a given order',
            'data'          => ['root_key' => 'transaction'],
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'order_id' => [
                    'description' => 'Order from which we need to extract transactions',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'kind' => [
                    'description' => 'The kind of transaction',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['authorization', 'capture', 'sale', 'void', 'refund'],
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        /**
         * --------------------------------------------------------------------------------
         * USAGE CHARGES RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/usagecharge
         * --------------------------------------------------------------------------------
         */

        'GetUsageCharges' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a list of usage charges for the given recurring application charges',
            'data'             => ['root_key' => 'usage_charges'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetUsageCharge' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific usage charge',
            'data'             => ['root_key' => 'usage_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific usage charge ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateUsageCharge' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/recurring_application_charges/{recurring_charge_id}/usage_charges.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new usage charge',
            'data'             => ['root_key' => 'usage_charge'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'recurring_charge_id' => [
                    'description' => 'Recurring charge from which we need to extract usage charges',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
                'description' => [
                    'description' => 'Usage charge description',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'price' => [
                    'description' => 'Price to charge',
                    'location'    => 'json',
                    'type'        => 'number',
                    'required'    => true
                ],
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * WEBHOOK RELATED METHODS
         *
         * DOC: https://docs.shopify.com/api/webhook
         * --------------------------------------------------------------------------------
         */

        'GetWebhooks' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/webhooks.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve a list of webhooks',
            'data'                 => ['root_key' => 'webhooks'],
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetWebhookCount' => [
            'httpMethod'           => 'GET',
            'uri'                  => 'admin/api/{version}/webhooks/count.json',
            'responseModel'        => 'GenericModel',
            'summary'              => 'Retrieve the number of webhooks',
            'parameters'           => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'GetWebhook' => [
            'httpMethod'       => 'GET',
            'uri'              => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Retrieve a specific webhook',
            'data'             => ['root_key' => 'webhook'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],

        'CreateWebhook' => [
            'httpMethod'       => 'POST',
            'uri'              => 'admin/api/{version}/webhooks.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Create a new webhook',
            'data'             => ['root_key' => 'webhook'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'format' => [
                    'description' => 'Type of data to return',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => ['json', 'xml']
                ],
                'address' => [
                    'description' => 'Specific URL for the webhook',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'topic' => [
                    'description' => 'List of webhook topic',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true,
                    'enum'        => [
                        'carts/create', 'carts/update', 'checkouts/create', 'checkouts/update', 'checkouts/delete', 'collections/create', 'collections/update',
                        'collections/delete', 'collection_listings/add', 'collection_listings/remove', 'collection_listings/update', 'customers/create',
                        'customers/enable', 'customers/disable', 'customers/update', 'customers/delete', 'customer_groups/create', 'customer_groups/update',
                        'customer_groups/delete', 'draft_orders/create', 'draft_orders/update', 'draft_orders/delete', 'fulfillments/create', 'fulfillments/update',
                        'fulfillment_events/create', 'fulfillment_events/delete', 'inventory_items/create', 'inventory_items/update', 'inventory_items/delete',
                        'inventory_levels/connect', 'inventory_levels/update', 'inventory_levels/disconnect', 'locations/create', 'locations/update',
                        'locations/delete', 'orders/cancelled', 'orders/create', 'orders/fulfilled', 'orders/paid', 'orders/partially_fulfilled',
                        'orders/updated', 'orders/delete', 'order_transactions/create', 'products/create', 'products/update', 'products/delete',
                        'product_listings/add', 'product_listings/remove', 'product_listings/update', 'refunds/create', 'app/uninstalled', 'shop/update',
                        'themes/create', 'themes/publish', 'themes/update', 'themes/delete'
                    ]
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'UpdateWebhook' => [
            'httpMethod'       => 'PUT',
            'uri'              => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Update an existing webhook',
            'data'             => ['root_key' => 'webhook'],
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ],
            ],
            'additionalParameters' => [
                'location' => 'json',
            ],
        ],

        'DeleteWebhook' => [
            'httpMethod'       => 'DELETE',
            'uri'              => 'admin/api/{version}/webhooks/{id}.json',
            'responseModel'    => 'GenericModel',
            'summary'          => 'Delete an existing webhook',
            'parameters'       => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'id' => [
                    'description' => 'Specific webhook ID',
                    'location'    => 'uri',
                    'type'        => 'integer',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * OTHERS
         * --------------------------------------------------------------------------------
         */

        'CreateDelegateAccessToken' => [
            'httpMethod'    => 'POST',
            'uri'           => 'admin/api/{version}/access_tokens/delegate.json',
            'responseModel' => 'GenericModel',
            'summary'       => 'Create a new delegate access token',
            'parameters'    => [
                'version' => [
                    'description' => 'API version',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'delegate_access_scope' => [
                    'description' => 'New scopes that are granted to the delegate access token',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                ],
            ],
            'additionalParameters' => [
                'location' => 'query',
            ],
        ],
    ],

    'models' => [
        'GenericModel' => [
            'type'       => 'object',
            'properties' => [
                'pagination' => [
                    'location' => 'header',
                    'sentAs'   => 'Link',
                    'type'     => 'string'
                ]
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];
