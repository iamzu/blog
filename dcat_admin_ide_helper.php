<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection tags
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection content_raw
     * @property Grid\Column|Collection content_html
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection show
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection tag_id
     * @property Grid\Column|Collection money
     * @property Grid\Column|Collection remarks
     * @property Grid\Column|Collection tag
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection income_money
     * @property Grid\Column|Collection expenditure_money
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection index
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection ID
     * @property Grid\Column|Collection user_name
     * @property Grid\Column|Collection user_type
     * @property Grid\Column|Collection o_price
     * @property Grid\Column|Collection r_price
     * @property Grid\Column|Collection code_name
     * @property Grid\Column|Collection c_time
     * @property Grid\Column|Collection zfb_number
     * @property Grid\Column|Collection zfb_account
     * @property Grid\Column|Collection is_pay
     * @property Grid\Column|Collection pay_time
     * @property Grid\Column|Collection is_hand
     * @property Grid\Column|Collection ord_number
     * @property Grid\Column|Collection paytouser
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection promote_user
     * @property Grid\Column|Collection agent_id
     * @property Grid\Column|Collection service_qq
     * @property Grid\Column|Collection custom_qq
     * @property Grid\Column|Collection ktuser
     * @property Grid\Column|Collection shouhou
     * @property Grid\Column|Collection post_id
     * @property Grid\Column|Collection subtitle
     * @property Grid\Column|Collection page_image
     * @property Grid\Column|Collection meta_description
     * @property Grid\Column|Collection is_draft
     * @property Grid\Column|Collection layout
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection published_at
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection tags(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection content_raw(string $label = null)
     * @method Grid\Column|Collection content_html(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection show(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection tag_id(string $label = null)
     * @method Grid\Column|Collection money(string $label = null)
     * @method Grid\Column|Collection remarks(string $label = null)
     * @method Grid\Column|Collection tag(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection income_money(string $label = null)
     * @method Grid\Column|Collection expenditure_money(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection index(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection ID(string $label = null)
     * @method Grid\Column|Collection user_name(string $label = null)
     * @method Grid\Column|Collection user_type(string $label = null)
     * @method Grid\Column|Collection o_price(string $label = null)
     * @method Grid\Column|Collection r_price(string $label = null)
     * @method Grid\Column|Collection code_name(string $label = null)
     * @method Grid\Column|Collection c_time(string $label = null)
     * @method Grid\Column|Collection zfb_number(string $label = null)
     * @method Grid\Column|Collection zfb_account(string $label = null)
     * @method Grid\Column|Collection is_pay(string $label = null)
     * @method Grid\Column|Collection pay_time(string $label = null)
     * @method Grid\Column|Collection is_hand(string $label = null)
     * @method Grid\Column|Collection ord_number(string $label = null)
     * @method Grid\Column|Collection paytouser(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection promote_user(string $label = null)
     * @method Grid\Column|Collection agent_id(string $label = null)
     * @method Grid\Column|Collection service_qq(string $label = null)
     * @method Grid\Column|Collection custom_qq(string $label = null)
     * @method Grid\Column|Collection ktuser(string $label = null)
     * @method Grid\Column|Collection shouhou(string $label = null)
     * @method Grid\Column|Collection post_id(string $label = null)
     * @method Grid\Column|Collection subtitle(string $label = null)
     * @method Grid\Column|Collection page_image(string $label = null)
     * @method Grid\Column|Collection meta_description(string $label = null)
     * @method Grid\Column|Collection is_draft(string $label = null)
     * @method Grid\Column|Collection layout(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection published_at(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection tags
     * @property Show\Field|Collection id
     * @property Show\Field|Collection content_raw
     * @property Show\Field|Collection content_html
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection show
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection tag_id
     * @property Show\Field|Collection money
     * @property Show\Field|Collection remarks
     * @property Show\Field|Collection tag
     * @property Show\Field|Collection status
     * @property Show\Field|Collection income_money
     * @property Show\Field|Collection expenditure_money
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection email
     * @property Show\Field|Collection url
     * @property Show\Field|Collection index
     * @property Show\Field|Collection token
     * @property Show\Field|Collection ID
     * @property Show\Field|Collection user_name
     * @property Show\Field|Collection user_type
     * @property Show\Field|Collection o_price
     * @property Show\Field|Collection r_price
     * @property Show\Field|Collection code_name
     * @property Show\Field|Collection c_time
     * @property Show\Field|Collection zfb_number
     * @property Show\Field|Collection zfb_account
     * @property Show\Field|Collection is_pay
     * @property Show\Field|Collection pay_time
     * @property Show\Field|Collection is_hand
     * @property Show\Field|Collection ord_number
     * @property Show\Field|Collection paytouser
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection promote_user
     * @property Show\Field|Collection agent_id
     * @property Show\Field|Collection service_qq
     * @property Show\Field|Collection custom_qq
     * @property Show\Field|Collection ktuser
     * @property Show\Field|Collection shouhou
     * @property Show\Field|Collection post_id
     * @property Show\Field|Collection subtitle
     * @property Show\Field|Collection page_image
     * @property Show\Field|Collection meta_description
     * @property Show\Field|Collection is_draft
     * @property Show\Field|Collection layout
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection published_at
     * @property Show\Field|Collection image
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection tags(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection content_raw(string $label = null)
     * @method Show\Field|Collection content_html(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection show(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection tag_id(string $label = null)
     * @method Show\Field|Collection money(string $label = null)
     * @method Show\Field|Collection remarks(string $label = null)
     * @method Show\Field|Collection tag(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection income_money(string $label = null)
     * @method Show\Field|Collection expenditure_money(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection index(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection ID(string $label = null)
     * @method Show\Field|Collection user_name(string $label = null)
     * @method Show\Field|Collection user_type(string $label = null)
     * @method Show\Field|Collection o_price(string $label = null)
     * @method Show\Field|Collection r_price(string $label = null)
     * @method Show\Field|Collection code_name(string $label = null)
     * @method Show\Field|Collection c_time(string $label = null)
     * @method Show\Field|Collection zfb_number(string $label = null)
     * @method Show\Field|Collection zfb_account(string $label = null)
     * @method Show\Field|Collection is_pay(string $label = null)
     * @method Show\Field|Collection pay_time(string $label = null)
     * @method Show\Field|Collection is_hand(string $label = null)
     * @method Show\Field|Collection ord_number(string $label = null)
     * @method Show\Field|Collection paytouser(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection promote_user(string $label = null)
     * @method Show\Field|Collection agent_id(string $label = null)
     * @method Show\Field|Collection service_qq(string $label = null)
     * @method Show\Field|Collection custom_qq(string $label = null)
     * @method Show\Field|Collection ktuser(string $label = null)
     * @method Show\Field|Collection shouhou(string $label = null)
     * @method Show\Field|Collection post_id(string $label = null)
     * @method Show\Field|Collection subtitle(string $label = null)
     * @method Show\Field|Collection page_image(string $label = null)
     * @method Show\Field|Collection meta_description(string $label = null)
     * @method Show\Field|Collection is_draft(string $label = null)
     * @method Show\Field|Collection layout(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection published_at(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
