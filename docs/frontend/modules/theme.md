# Modules: Theme

This module exists to detect and set the theme.

Exported functions include:

- [detect](#detect)
- [set](#set)

## detect

**Description:**

Detect theme.

In order of priority:

- Local storage
- Browser scheme

Adds an event listener for any element containing `data-theme-toggle` to change the theme
to its value when clicked.

**Parameters:**

- (none)

**Returns:**

- (void)

## set

**Description:**

Set theme.

- Adds class to document
- Saves theme to local storage

**Parameters:**

- `value` (string)

**Returns:**

- (void)