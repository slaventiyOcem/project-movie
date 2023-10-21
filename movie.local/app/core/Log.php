<?php

namespace app\core;

/**
 * The Log class handles logging messages to a file.
 */
class Log
{
    /**
     * Constant defining the log file name.
     */
    const LOG_FILE = 'error.log';

    /**
     * Static private property holding the single instance of the Log class.
     * @var Log|null
     */
    static private ?Log $instance = null;

    /**
     * The file path of the log file.
     * @var string|false
     */
    private string|bool $fileName;

    /**
     * An array to store log messages.
     * @var array
     */
    private array $messages;

    /**
     * Constructor of the Log class that initializes the log file path.
     */
    private function __construct()
    {
        $this->fileName = realpath(self::LOG_FILE);
    }

    /**
     * Method to get the single instance of the Log class (Singleton implementation).
     *
     * @return Log
     */
    public static function getInstance(): Log
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Method to log an informational message.
     *
     * @param string $message The message to be logged.
     */
    public static function info(string $message)
    {
        $instance = self::getInstance();

        // Format the message by adding the current date and time
        $formattedMessage = date('Y-m-d H:i:s') . ' ' . $message . PHP_EOL;

        // Add the message to the messages array of the object
        $instance->messages[] = $formattedMessage;
    }

    /**
     * Destructor that is called when the object is destroyed.
     * It writes all log messages to the log file by appending them.
     */
    public function __destruct()
    {
        // Combine all messages from the array into a single string, separating them with line breaks
        $str = implode("\n", $this->messages);

        // Write the concatenated messages to the log file, appending them to the end of the file
        file_put_contents($this->fileName, $str, FILE_APPEND);
    }
}
