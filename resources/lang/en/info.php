<?php

return [
    'global'       => [
        'error-failed'               => 'ERROR: Failed, Try Again !!.',
        'input-field-empty'          => 'Error:: Input field should not Empty !!',
        'slug_unique'                => 'Error:: Slug must be unique',
        'enter_verify_code'          => 'Enter the verification code',
        'old_pass_not_match'         => 'Old password not match',
        'image_type_error'           => 'Image must be in jpeg,jpg,png',
        'verification_code_send'     => 'Your verification code sent successfully',
        'verification_code_sent'     => 'Your verification code sent successfully',
        'verification_code_failed'   => 'Verification code sending failed',
        'otp_successful'             => 'OTP verification successful',
        'verification_failed'        => 'Verification failed',
        'verification_code_resend'   => 'Verification code resend successfully',
        'verification_recode_failed' => 'Resend verification code failed',
        'please_verify_phone'        => 'Please verify your phone',
        'please_verify_email'        => 'Please verify your email',
        'account_inactive_verify'    => 'Your account is inactive, we have sent you an email to  click verify link or otp code',
        'something_wrong'            => 'ERROR:Something Went Wrong, Please Try Again !!.',
        'get_union_wise_ward'        => 'Get Union Wise Ward',
        'login_success'              => 'Login Successful',
        'old_phone'                  => 'Old phone not allowed',
        'old_email'                  => 'Old email not allowed',
        'logout_success'             => 'Logout Successful',
        'cart_success'               => 'Product added in cart successfully',
        'slug-unique'                => 'Error:: Slug must be unique',
        'show_cart'                  => 'Show All Cart Items',
        'place_order'                => 'Order Placed Successfully',
        'place_order_failed'         => 'Order Placed Failed',
        'can_not_delete_phone'       => 'Can\'t delete phone',
        'phone_successfully_removed' => 'Your phone is successfully removed',
        'email_update_success'       => 'Email added/updated successfully',
        'email_successfully_removed' => 'Your email is successfully removed',
        'can_not_delete_email'       => 'Sorry, email can not be removed',
        'invalid_request'            => 'Your request is invalid',
        'account_banned'             => "Your account is temporarily banned",
    ],
    'user'         => [
        'update-success'          => 'User Update Success',
        'profile_update_success'  => 'Your profile updated successfully',
        'geo_area_updated'        => 'Your geo area updated',
        'avatar_updated_success'  => 'Your avatar updated successfully',
        'phone_taken'             => 'Phone already taken',
        'email_taken'             => 'Email already taken',
        'registration_success'    => 'New user register successfully',
        'password_min'            => 'Error:: Password  should be minimum 8 Character !!',
        'password_change_success' => 'Password Change Success',
        'password_mismatch'       => 'ERROR:Password And Confirm Password Mismatch.',
        'delete_failed'           => 'User Deletion Failed',
        'delete_success'          => 'User Delete Success',
        'register_success'        => 'You are registered successfully',
        'register_failed'         => 'Registration Failed',
        'store_address_success'   => 'Address stored successfully',
        'update_address_success'  => 'Address updated successfully',
        'delete_address_success'  => 'Address deleted successfully',
        'address_list'            => "Address List",
        'phone_update_success'    => 'Phone updated successfully',
        'avatar_deleted_success'  => 'Avatar deleted successfully',
    ],
    'role'         => [
        'created_success'     => 'Role Created Successfully.',
        'created_failed'      => 'Role Creation Failed',
        'assign_role_success' => 'Role Assign Successfully.',
        'updated_success'     => 'Role Update Success',
        'updated_failed'      => 'Role Updated Failed',
        'delete_success'      => 'Role Deleted Successfully',
        'delete_failed'       => 'Role Delete Failed',
    ],
    'password'     => [
        'reset-code'    => 'Password reset code send successfully',
        'reset-success' => 'Your password reset successfully',
        'reset-failed'  => 'Reset password failed',
    ],
    'invalid'      => [
        'phone'       => 'Phone number is invalid',
        'email'       => 'Email is invalid',
        'request'     => 'Invalid Request',
        'credentials' => 'Your credentials is invalid',
    ],
    'verification' => [
        'success'            => 'Verification Success',
        'failed'             => 'Verification Failed',
        'code-resend'        => 'Verification code resend successfully',
        'code-resend-failed' => 'Resend verification code failed',
        'otp_timeout'        => 'Otp timeout',
    ],
    'news'         => [
        'validation_failed'        => 'News Validation Error',
        'news_created'             => 'News Created Successfully',
        'creation_failed'          => 'News Creation Failed',
        'deleted_success'          => 'News Deleted Successfully',
        'deletion_failed'          => 'News Deletion Failed',
        'unique_slug_error'        => 'News Slug Must be Unique',
        'news_updated'             => 'News Updated Successfully',
        'updated_failed'           => 'News Updated Failed',
        'seo_updated'              => 'Seo Updated Successfully',
        'seo_update_failed'        => 'Seo Update Failed',
        'news_image_update_failed' => 'News Image Update Failed',
        'news_image_updated'       => 'News Image Update Successfully',
        'single_news'              => 'Single News Info',
        'latest_news'              => 'Latest News',
        'news_listing'             => 'News Listing',
        'news_geo_updated'         => 'News Geo Updated Successfully',
        'news_geo_update_failed'   => 'News Geo Update Failed',
        'tag'                      => [
            'list'           => 'Tag listing',
            'create'         => 'Tag Created Successfully.',
            'update-success' => 'Tag Update Success',
            'update-failed'  => 'ERROR: Tag Update Failed.',
            'delete_success' => 'Tag Deleted Successfully',
            'delete_failed'  => 'Tag Deleted Failed',
        ],
        'category'                 => [
            'list'                             => 'Category Listing',
            'category_creation_failed'         => 'Category Creation Failed',
            'category_create_success'          => 'Category created successfully',
            'parent_category_not_found'        => 'Parent Category Not Found',
            'created'                          => 'Category Created',
            'have_child'                       => 'Category Have Child Category!',
            'parent_category_different'        => 'Parent Category must be Different',
            'updated'                          => 'category Updated',
            'update_failed'                    => 'Category Updated Failed',
            'single_category_info'             => 'Single Category Info',
            'news_category_failed'             => 'Category failed',
            'title_required'                   => 'Title required',
            'update_success'                   => 'Category updated successfully',
            'delete_parent_news_category_fail' => 'News category delete failed! Delete or remove child type first',
            'delete_news_category_fail'        => 'News category delete failed!',
            'delete_news_category_success'     => 'News category deleted successfully',
        ],
    ],
    'page'         => [
        'delete_success'  => 'Page Deleted Successfully',
        'delete_failed'   => 'Page Deleted Failed',
        'created_success' => 'Page Created Successfully',
        'created_failed'  => 'Page Created Failed',
        'update_success'  => 'Page Update Successfully',
        'update_failed'   => 'Page Update Failed',
    ],
    'permission'   => [
        'created_success'        => 'Permission Created Successfully.',
        'created_failed'         => 'ERROR: Failed, Try Again !!.',
        'update_failed'          => 'ERROR: Permission Update Failed.',
        'update_success'         => 'Permission Update Successful.',
        'delete_success'         => 'Permission Delete Success',
        'delete_failed'          => 'ERROR: Permission Delete Failed.',
        'role_empty'             => 'Error:: Role should not Empty !!',
        'assign_role_success'    => 'Permission Assign Success in a Role.',
        'something_wrong'        => 'Error:: Something Went Wrong !!',
        'remove_permission_role' => 'Remove Permission for this Role',
        'unauthorize'            => 'Unauthorized',
    ],
    'product'      => [
        'details'         => 'Product Details',
        'review_success'  => 'Your review added successfully',
        'review_approved' => 'Review approved successfully',
        'review_rejected' => 'Review rejected successfully',
    ],
    "review"       => [
        'all'                        => 'All Review',
        'required'                   => 'Review is required',
        'updated'                    => 'Review is updated successfully',
        'update_failed'              => 'Review update failed',
        'deleted'                    => 'Review deleted successfully',
        'approval_pending'           => 'Your review is pending for approval',
        "already_reviewed_product"   => 'Already review this product',
        "image_delete_success"       => 'Image Delete Successful',
        "image_delete_fail"          => 'Image Delete Failed',
        "image_delete_noimage"       => 'Image Delete Failed(No images found)',
        "image_upload_success"       => 'Image Upload Successful',
        "image_upload_failed"        => 'Image Upload Failed',
        "delete_review_image_failed" => 'Review Image Delete Failed',
        "image_upload_limit_error"   => 'Sorry, maximum 5 images can be uplaoded',
    ],
    "order"        => [
        'all'                        => 'All Order',
        'deleted_success'            => 'Order deleted successfully',
        'deletion_failed'            => 'Order Deletion Failed',
        'order_details'              => 'Order Details',
        'order_item_deleted_success' => 'Order item deleted successfully',
        'order_info_update'          => 'Order info updated successfully',
    ],
    "payment"      => [
        'all' => 'All payment',
    ],
    "shop"         => [
        "list" => 'Geo Wise Shops',
    ],
];