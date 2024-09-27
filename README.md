# BigTeddies_Promotions module

<font color='red'>**The following example is a complete README for a module BigTeddies_Promotions:** </font>
# BigTeddies_Promotions module
The module creates 3 tables:
big_teddies_promotions,
big_teddies_promotions_groups,
big_teddies_promotion_group,
in which information about promotions will be stored. Each promotion can belong to many groups. Before we create a promotion, we must have already created the groups to which we want to add them.

## Installation details

You need to download the module. Please put its code in `app/code/BigTeddies/Promotions`. Then execute the commands:
`bin/magento setup:upgrade`
`bin/magento setup:di:compile`
`bin/magento cache:clean`

## User guide

Moduł udostępnia 6 endpointów:
- `{domain}/rest/V1/promotions/list`
- `{domain}/rest/V1/promotions/add`
- `{domain}/rest/V1/remove/:promotionId`
- `{domain}/rest/V1/promotions/groups`
- `{domain}/rest/V1/promotions/addgroups`
- `{domain}/rest/V1/promotions/removegroup/:groupId`

You can find detailed information about them in `{domain}/swagger` after adding admin authorization in the sections:
`bigTeddiesPromotionsV1` and `bigTeddiesPromotionsGroupsV1`.
