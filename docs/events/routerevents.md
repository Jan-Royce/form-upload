# Events: RouterEvents

Router-related events.

| Subscription (method)         | Event           | Priority |
|-------------------------------|-----------------|----------|
| [addRoutes](#addroutes)       | `app.bootstrap` | 10       |

## addRoutes

Define routes.

The following routes have been defined:

| Name      | Path        | Filtered |
|-----------|-------------|----------|
| `storage` | `/storage`  | No       |
 | N/A       | `/status` * | No       |
 | `home`    | `/`         | Yes      |

* The `/status` route exists as an example of returning a simple JSON server status response.

### Filtered

Unfiltered routes use the predefined `router.route_prefix` config value as the route prefix.
Filtered routes use the `router.route_prefix` filter to define the route prefix.

Unfiltered routes are ideal for non-changing routes such as for static assets and API endpoints.